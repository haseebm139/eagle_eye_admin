<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;

class CustomerController extends Controller
{
    public function getUserChart(Request $request){
        $labels = [];
        $data = [];
        $currentDate = Carbon::now();
        for ($i = 1; $i <= 12; $i++) {
            $startDate = Carbon::create($currentDate->year, $i, 1);
            $endDate = $startDate->copy()->endOfMonth();

            $labels[] = $startDate->format('M'); // Month abbreviation
            $data[] = User::whereBetween('since', [$startDate, $endDate])->count();
        }
        return response()->json(['labels' => $labels, 'data' => $data]);
    }

    public function showUploadForm()
    {
        return view('upload_users');
    }
    public function uploadUsers(Request $request)
    {

        // Validate file input
        $request->validate([
            'file' => 'required|mimes:csv,txt|max:2048',
        ]);

        // Handle file upload
        $file = $request->file('file');

        // Use PhpSpreadsheet to read the CSV
        try {
            $reader = IOFactory::createReaderForFile($file->getRealPath());
            $spreadsheet = $reader->load($file->getRealPath());
            $worksheet = $spreadsheet->getActiveSheet();
            $rows = $worksheet->toArray();

            // Get the header row (first row)
            $headers = $rows[0];

            // Start from the second row (skip the header row)

            foreach ($rows as $index => $row) {
                if ($index == 0) {
                    continue; // Skip header
                }

                $data = array_combine($headers, $row);
                if ($data['email'] == null) {
                    continue;
                }
                if (User::where('email', $data['email'])->exists()) {
                    continue; // Skip this entry if email exists
                }

                $dateRegistered = '';
                $customDate = \Carbon\Carbon::parse('1/11/2022')->format('Y-m-d')??now();
                if (!$data['date_registered'] == 'NULL') {
                    $dateRegistered = \Carbon\Carbon::parse($data['date_registered'])->format('Y-m-d');

                }else{
                    $dateRegistered = $customDate;

                }


                $user = User::create([
                    'name' => $data['first_name'],
                    'last_name' => $data['last_name'],
                    'email' => $data['email'],
                    'password'=>Hash::make('Dummy1234'),
                    'country' => $data['country'] ?? null,
                    'state' => $data['state'] ?? null,
                    'city' => $data['city'] ?? null,
                    'since' => $dateRegistered, // Default to the current date
                ]);

                // If phone number, job title, etc., are available, they can be mapped similarly
            }

            return redirect()->back()->with('success', 'Users uploaded successfully.');
        } catch (Exception $e) {
            dd($e);
            return redirect()->back()->with('error', 'Error uploading file: ' . $e->getMessage());
        }
    }
    public function index(Request $request){
        $perPage = $request->input('items_per_page', 10);

        // Start a query for the Product model
        $query = User::where('type', '=', 'user');

        // Search functionality
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%")
                ->orWhere('country', 'LIKE', "%{$search}%")
                ->orWhere('city', 'LIKE', "%{$search}%")
                ->orWhere('state', 'LIKE', "%{$search}%");

            });
        }

        // Pagination
        $user = $query->paginate($perPage); // This handles pagination

        return response()->json([
            'user' => $user->items(),
            'total' => $user->total(),
            'current_page' => $user->currentPage(),
            'last_page' => $user->lastPage(),
        ]);
    }
    public function create(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'nullable|string|max:15', // Adjust based on your phone format
            'state' => 'nullable|string|max:100',
            'country' => 'nullable|string|max:100',
            'city' => 'nullable|string|max:100',
            'address' => 'nullable|string|max:100',
        ]);

        // Check if validation fails
        if ($validator->fails()) {


            return redirect()->back()->with(array('message'=>$validator->errors()->first(),'type'=>'error'));
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'country' => $request->country,
            'state' => $request->state,
            'city' => $request->city,
            'address' => $request->address,
            'password' => Hash::make('dummy1234'), // Hashing the password
        ]);
        return redirect()->back()->with(array('message'=>'Customer created successfully','type'=>'success'));

    }

    public function toggleStatus($id)
    {
        try {

            $user = User::findOrFail($id);
            if (!$user) {
                return redirect()->back()->with(array('message'=>'User not Found!','type'=>'error'));
            }

            $user->status = $user->status == '0' ? '1' : '0';
            $user->save();

            return redirect()->back()->with(array('message'=>'User status updated successfully!','type'=>'success'));
        } catch (\Throwable $th) {

            return redirect()->back()->with(array('message'=>'Something Went Wrong','type'=>'error'));
        }


    }
}
