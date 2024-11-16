@extends('layout.master')
@section('title', 'Support')

@section('style')
    <style>
        #frame {
            width: 100%;
            height: 92vh;
            min-height: 300px;
            max-height: 720px;
            background: #fff;
            box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
            padding: 30px;
        }

        @media screen and (max-width: 360px) {
            #frame {
                width: 100%;
                height: 100vh;
            }
        }

        #frame #sidepanel {
            float: left;
            min-width: 280px;
            max-width: 340px;
            width: 40%;
            height: 100%;
            background: #fff;
            color: #333;
            overflow: hidden;
            position: relative;
            border: 1px solid #EFF1F4;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        @media screen and (max-width: 735px) {
            #frame #sidepanel {
                width: 58px;
                min-width: 58px;
                padding: 0px;
            }

            #frame .content .messages ul li {
                width: 100%;
            }
        }

        #frame #sidepanel #profile {
            width: 80%;

        }

        @media screen and (max-width: 735px) {
            #frame #sidepanel #profile {
                width: 100%;
                margin: 0 auto;
                padding: 5px 0 0 0;
                background: #EFF1F4;
            }
        }

        #frame #sidepanel #profile.expanded .wrap {
            height: 210px;
            line-height: initial;
        }

        #frame #sidepanel #profile.expanded .wrap p {
            margin-top: 20px;
        }

        #frame #sidepanel #profile.expanded .wrap i.expand-button {
            -moz-transform: scaleY(-1);
            -o-transform: scaleY(-1);
            -webkit-transform: scaleY(-1);
            transform: scaleY(-1);
            filter: FlipH;
            -ms-filter: "FlipH";
        }

        #frame #sidepanel #profile .wrap span {
            font-size: 18px;
            padding-right: 40px;
            border-bottom: 2px solid #000;
            padding-bottom: 5px;
        }

        #frame #sidepanel #profile .wrap {
            height: 60px;
            line-height: 60px;
            overflow: hidden;
            -moz-transition: 0.3s height ease;
            -o-transition: 0.3s height ease;
            -webkit-transition: 0.3s height ease;
            transition: 0.3s height ease;
        }

        @media screen and (max-width: 735px) {
            #frame #sidepanel #profile .wrap {
                height: 55px;
            }
        }

        #frame #sidepanel #profile .wrap img {
            width: 50px;
            border-radius: 50%;
            padding: 3px;
            border: 2px solid #e74c3c;
            height: auto;
            float: left;
            cursor: pointer;
            -moz-transition: 0.3s border ease;
            -o-transition: 0.3s border ease;
            -webkit-transition: 0.3s border ease;
            transition: 0.3s border ease;
        }

        @media screen and (max-width: 735px) {
            #frame #sidepanel #profile .wrap img {
                width: 40px;
                margin-left: 4px;
            }
        }

        #frame #sidepanel #profile .wrap img.online {
            border: 2px solid #2ecc71;
        }

        #frame #sidepanel #profile .wrap img.away {
            border: 2px solid #f1c40f;
        }

        #frame #sidepanel #profile .wrap img.busy {
            border: 2px solid #e74c3c;
        }

        #frame #sidepanel #profile .wrap img.offline {
            border: 2px solid #95a5a6;
        }

        #frame #sidepanel #profile .wrap p {
            float: left;
            margin-left: 15px;
        }

        @media screen and (max-width: 735px) {
            #frame #sidepanel #profile .wrap p {
                display: none;
            }
        }

        #frame #sidepanel #profile .wrap i.expand-button {
            float: right;
            margin-top: 23px;
            font-size: 0.8em;
            cursor: pointer;
            color: #435f7a;
        }

        @media screen and (max-width: 735px) {
            #frame #sidepanel #profile .wrap i.expand-button {
                display: none;
            }
        }

        #frame #sidepanel #profile .wrap #status-options {
            position: absolute;
            opacity: 0;
            visibility: hidden;
            width: 150px;
            margin: 70px 0 0 0;
            border-radius: 6px;
            z-index: 99;
            line-height: initial;
            background: #435f7a;
            -moz-transition: 0.3s all ease;
            -o-transition: 0.3s all ease;
            -webkit-transition: 0.3s all ease;
            transition: 0.3s all ease;
        }

        @media screen and (max-width: 735px) {
            #frame #sidepanel #profile .wrap #status-options {
                width: 58px;
                margin-top: 57px;
            }
        }

        #frame #sidepanel #profile .wrap #status-options.active {
            opacity: 1;
            visibility: visible;
            margin: 75px 0 0 0;
        }

        @media screen and (max-width: 735px) {
            #frame #sidepanel #profile .wrap #status-options.active {
                margin-top: 62px;
            }
        }

        #frame #sidepanel #profile .wrap #status-options:before {
            content: "";
            position: absolute;
            width: 0;
            height: 0;
            border-left: 6px solid transparent;
            border-right: 6px solid transparent;
            border-bottom: 8px solid #435f7a;
            margin: -8px 0 0 24px;
        }

        @media screen and (max-width: 735px) {
            #frame #sidepanel #profile .wrap #status-options:before {
                margin-left: 23px;
            }
        }

        #frame #sidepanel #profile .wrap #status-options ul {
            overflow: hidden;
            border-radius: 6px;
        }

        #frame #sidepanel #profile .wrap #status-options ul li {
            padding: 15px 0 30px 18px;
            display: block;
            cursor: pointer;
        }

        @media screen and (max-width: 735px) {
            #frame #sidepanel #profile .wrap #status-options ul li {
                padding: 15px 0 35px 22px;
            }
        }

        #frame #sidepanel #profile .wrap #status-options ul li:hover {
            background: #496886;
        }

        #frame #sidepanel #profile .wrap #status-options ul li span.status-circle {
            position: absolute;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            margin: 5px 0 0 0;
        }

        @media screen and (max-width: 735px) {
            #frame #sidepanel #profile .wrap #status-options ul li span.status-circle {
                width: 14px;
                height: 14px;
            }
        }

        #frame #sidepanel #profile .wrap #status-options ul li span.status-circle:before {
            content: "";
            position: absolute;
            width: 14px;
            height: 14px;
            margin: -3px 0 0 -3px;
            background: transparent;
            border-radius: 50%;
            z-index: 0;
        }

        @media screen and (max-width: 735px) {
            #frame #sidepanel #profile .wrap #status-options ul li span.status-circle:before {
                height: 18px;
                width: 18px;
            }
        }

        #frame #sidepanel #profile .wrap #status-options ul li p {
            padding-left: 12px;
        }

        @media screen and (max-width: 735px) {
            #frame #sidepanel #profile .wrap #status-options ul li p {
                display: none;
            }
        }

        #frame #sidepanel #profile .wrap #status-options ul li#status-online span.status-circle {
            background: #2ecc71;
        }

        #frame #sidepanel #profile .wrap #status-options ul li#status-online.active span.status-circle:before {
            border: 1px solid #2ecc71;
        }

        #frame #sidepanel #profile .wrap #status-options ul li#status-away span.status-circle {
            background: #f1c40f;
        }

        #frame #sidepanel #profile .wrap #status-options ul li#status-away.active span.status-circle:before {
            border: 1px solid #f1c40f;
        }

        #frame #sidepanel #profile .wrap #status-options ul li#status-busy span.status-circle {
            background: #e74c3c;
        }

        #frame #sidepanel #profile .wrap #status-options ul li#status-busy.active span.status-circle:before {
            border: 1px solid #e74c3c;
        }

        #frame #sidepanel #profile .wrap #status-options ul li#status-offline span.status-circle {
            background: #95a5a6;
        }

        #frame #sidepanel #profile .wrap #status-options ul li#status-offline.active span.status-circle:before {
            border: 1px solid #95a5a6;
        }

        #frame #sidepanel #profile .wrap #expanded {
            padding: 100px 0 0 0;
            display: block;
            line-height: initial !important;
        }

        #frame #sidepanel #profile .wrap #expanded label {
            float: left;
            clear: both;
            margin: 0 8px 5px 0;
            padding: 5px 0;
        }

        #frame #sidepanel #profile .wrap #expanded input {
            border: none;
            margin-bottom: 6px;
            background: #32465a;
            border-radius: 3px;
            color: #f5f5f5;
            padding: 7px;
            width: calc(100% - 43px);
        }

        #frame #sidepanel #profile .wrap #expanded input:focus {
            outline: none;
            background: #435f7a;
        }

        #frame #sidepanel #search {
            display: flex;
            align-items: center;
        }

        @media screen and (max-width: 735px) {
            #frame #sidepanel #search {
                display: none;
            }
        }

        #frame #sidepanel #search label {
            position: absolute;
            margin: 0px 0 0 20px;
        }

        #frame #sidepanel #search input {
            font-family: "proxima-nova", "Source Sans Pro", sans-serif;
            padding: 10px 0 10px 46px;
            width: calc(100% - 25px);
            border: none;
            background: #F5F5F5;
            color: #000;
        }

        #frame #sidepanel #search input:focus {
            outline: none;
            background: #F5F5F5;
        }

        #frame #sidepanel #search input::-webkit-input-placeholder {
            color: #000;
        }

        #frame #sidepanel #search input::-moz-placeholder {
            color: #f5f5f5;
        }

        #frame #sidepanel #search input:-ms-input-placeholder {
            color: #f5f5f5;
        }

        #frame #sidepanel #search input:-moz-placeholder {
            color: #f5f5f5;
        }

        #frame #sidepanel #contacts ul {
            list-style-type: none !important;
            padding: 0px;
        }

        #frame #sidepanel #contacts {
            height: calc(100% - 177px);
            overflow-y: scroll;
            overflow-x: hidden;
        }

        @media screen and (max-width: 735px) {
            #frame #sidepanel #contacts {
                height: 100%;
                overflow-y: scroll;
                overflow-x: hidden;
            }

            #frame #sidepanel #contacts::-webkit-scrollbar {
                display: none;
            }
        }

        #frame #sidepanel #contacts.expanded {
            height: calc(100% - 334px);
        }

        #frame #sidepanel #contacts::-webkit-scrollbar {
            width: 4px;
            background: #fff;
        }

        #frame #sidepanel #contacts::-webkit-scrollbar-thumb {
            background-color: #000;
        }

        #frame #sidepanel #contacts ul li.contact {
            position: relative;
            padding: 10px 0 15px 0;
            font-size: 0.9em;
            cursor: pointer;
            border-bottom: 1px solid #f5f5f5;
        }

        @media screen and (max-width: 735px) {
            #frame #sidepanel #contacts ul li.contact {
                padding: 6px 0 0px 8px;
            }
        }

        #frame #sidepanel #contacts ul li.contact:hover {
            background: #f5f5f5;
            border-right: 5px solid #fff;
            border-bottom: 1px solid #f5f5f5;
        }

        #frame #sidepanel #contacts ul li.contact.active {
            background: #f5f5f5;
            border-right: 5px solid #fff;
            border-bottom: 1px solid #f5f5f5;
        }

        #frame #sidepanel #contacts ul li.contact.active span.contact-status {
            border: 2px solid #32465a !important;
        }

        #frame #sidepanel #contacts ul li.contact .wrap {
            width: 88%;
            margin: 0 auto;
            position: relative;
        }

        @media screen and (max-width: 735px) {
            #frame #sidepanel #contacts ul li.contact .wrap {
                width: 100%;
            }
        }

        #frame #sidepanel #contacts ul li.contact .wrap span {
            position: absolute;
            left: 0;
            margin: -2px 0 0 -2px;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            border: 2px solid #2c3e50;
            background: #95a5a6;
        }

        #frame #sidepanel #contacts ul li.contact .wrap span.online {
            background: #2ecc71;
        }

        #frame #sidepanel #contacts ul li.contact .wrap span.away {
            background: #f1c40f;
        }

        #frame #sidepanel #contacts ul li.contact .wrap span.busy {
            background: #e74c3c;
        }

        #frame #sidepanel #contacts ul li.contact .wrap img {
            width: 40px;
            border-radius: 50%;
            float: left;
            margin-right: 10px;
        }

        @media screen and (max-width: 735px) {
            #frame #sidepanel #contacts ul li.contact .wrap img {
                margin-right: 0px;
            }
        }

        #frame #sidepanel #contacts ul li.contact .wrap .meta {
            padding: 5px 0 0 0;
        }

        @media screen and (max-width: 735px) {
            #frame #sidepanel #contacts ul li.contact .wrap .meta {
                display: flex;
                align-items: center;
                justify-content: center;
                flex-direction: column;
            }

            #frame #sidepanel #contacts ul li.contact .wrap {
                display: flex;
                align-items: center;
                justify-content: center;
                flex-direction: column;
            }
            #frame {
                padding: 0px;
                display: flex;
            }
            
        #frame #sidepanel #contacts ul li.contact .wrap .meta .name {
            font-weight: 600;
            font-size: 10px;
            text-align: center;
        }
        }

        #frame #sidepanel #contacts ul li.contact .wrap .meta .name {
            font-weight: 600;
        }

        #frame #sidepanel #contacts ul li.contact .wrap .meta .preview {
            margin: 5px 0 0 0;
            padding: 0 0 1px;
            font-weight: 400;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            -moz-transition: 1s all ease;
            -o-transition: 1s all ease;
            -webkit-transition: 1s all ease;
            transition: 1s all ease;
        }

        #frame #sidepanel #contacts ul li.contact .wrap .meta .preview span {
            position: initial;
            border-radius: initial;
            background: none;
            border: none;
            padding: 0 2px 0 0;
            margin: 0 0 0 1px;
            opacity: 0.5;
        }

        #frame #sidepanel #bottom-bar {
            position: absolute;
            width: 100%;
            bottom: 0;
        }

        #frame #sidepanel #bottom-bar button {
            float: left;
            border: none;
            width: 50%;
            padding: 10px 0;
            background: #32465a;
            color: #f5f5f5;
            cursor: pointer;
            font-size: 0.85em;
            font-family: "proxima-nova", "Source Sans Pro", sans-serif;
        }

        @media screen and (max-width: 735px) {
            #frame #sidepanel #bottom-bar button {
                float: none;
                width: 100%;
                padding: 15px 0;
            }
        }

        #frame #sidepanel #bottom-bar button:focus {
            outline: none;
        }

        #frame #sidepanel #bottom-bar button:nth-child(1) {
            border-right: 1px solid #2c3e50;
        }

        @media screen and (max-width: 735px) {
            #frame #sidepanel #bottom-bar button:nth-child(1) {
                border-right: none;
                border-bottom: 1px solid #2c3e50;
            }
        }

        #frame #sidepanel #bottom-bar button:hover {
            background: #435f7a;
        }

        #frame #sidepanel #bottom-bar button i {
            margin-right: 3px;
            font-size: 1em;
        }

        @media screen and (max-width: 735px) {
            #frame #sidepanel #bottom-bar button i {
                font-size: 1.3em;
            }
        }

        @media screen and (max-width: 735px) {
            #frame #sidepanel #bottom-bar button span {
                display: none;
            }
        }

        #frame .content {
            float: left;
            width: 55%;
            height: 100%;
            overflow: hidden;
            position: relative;
            border: 1px solid #F5F5F5;
            margin-right: 30px;
            border-radius: 10px;
        }

        @media screen and (max-width: 735px) {
            #frame .content {
                width: calc(100% - 80px);
                min-width: 250px !important;
            }

            #frame .content {
                margin-right: 0px;
            }
        }

        @media screen and (min-width: 900px) {
            #frame .content {
                width: calc(100% - 440px);
            }
        }

        #frame .content .contact-profile {
            width: 100%;
            height: 60px;
            line-height: 60px;
            background: #fff;
        }

        #frame .content .contact-profile img {
            width: 40px;
            border-radius: 50%;
            float: left;
            margin: 9px 12px 0 9px;
        }

        #frame .content .contact-profile p {
            float: left;
        }

        #frame .content .contact-profile .social-media {
            float: right;
        }

        #frame .content .contact-profile .social-media i {
            margin-left: 14px;

            cursor: pointer;
        }

        #frame .content .contact-profile .social-media i:nth-last-child(1) {
            margin-right: 20px;
        }

        #frame .content .contact-profile .social-media i:hover {
            color: #435f7a;
        }

        #frame .content .messages {
            height: auto;
            min-height: calc(100% - 130px);
            max-height: calc(100% - 130px);
            overflow-y: scroll;
            overflow-x: hidden;
            width: 100%;
            background: #F5F5F5;
            border-radius: 30px 30px 0px 0px;
            border: 1px solid #000;
            border-bottom: none;
            padding-right: 40px;
        }

        @media screen and (max-width: 735px) {
            #frame .content .messages {
                max-height: calc(100% - 105px);
            }
        }

        #frame .content .messages::-webkit-scrollbar {
            width: 8px;
            background: rgba(0, 0, 0, 0);
        }

        #frame .content .messages::-webkit-scrollbar-thumb {
            background-color: rgba(0, 0, 0, 0.3);
        }

        #frame .content .messages ul li {
            display: inline-block;
            clear: both;
            float: left;
            margin: 15px 15px 5px 15px;
            width: calc(100% - 25px);
            font-size: 0.9em;
        }

        #frame .content .messages ul li:nth-last-child(1) {
            margin-bottom: 20px;
        }

        #frame .content .messages ul li.sent img {
            margin: 6px 8px 0 0;
        }

        #frame .content .messages ul li.sent {
            display: flex;
            flex-direction: column;
            gap: 10px;

}
#frame .content .messages ul li.sent span{
  padding-left: 20px;
}
#frame .content .messages ul li.sent p {
  background: #ffff;
  color: #000;
  border-radius: 20px 20px 20px 0px;
}
#frame .content .messages ul li.replies{
  display: flex;
  flex-direction: column;
  align-items: flex-end;
  gap:10px;
}
#frame .content .messages ul li.replies span{
  float: right;
}
#frame .content .messages ul li.replies img {
  float: right;
  margin: 6px 0 0 8px;
}
#frame .content .messages ul li.replies p {
  background: #000;
  color: #fff;
  float: right;
  border-radius: 20px 20px 0px 20px;
}
#frame .content .messages ul li img {
  width: 22px;
  border-radius: 50%;
  float: left;
}
#frame .content .messages ul li p {
  display: inline-block;
  padding: 10px 15px;
  border-radius: 20px;
  max-width: 205px;
  line-height: 130%;
}
@media screen and (min-width: 735px) {
  #frame .content .messages ul li p {
    max-width: 300px;
  }
  #frame .content .messages ul li {
    margin: 0px;
  }
}
#frame .content .message-input {
  position: absolute;
  bottom: 0;
  width: 100%;
  z-index: 99;
  background: #F5F5F5;
  padding:0px 20px 20px 20px;
  border: 1px solid #000;
  border-top:0px;
  border-radius:0px 0px 20px 20px;
}
#frame .content .message-input .wrap {
  position: relative;
}
#frame .content .message-input .wrap input {
  font-family: "proxima-nova", "Source Sans Pro", sans-serif;
  float: left;
  border: none;
  width: calc(100% - 90px);
  padding: 11px 32px 10px 8px;
  font-size: 0.8em;
  color: #32465a;
}
@media screen and (max-width: 735px) {
  #frame .content .message-input .wrap input {
    padding: 15px 32px 16px 8px;
  }
}
#frame .content .message-input .wrap input:focus {
  outline: none;
}
#frame .content .message-input .wrap .attachment {
  position: absolute;
  right: 60px;
  z-index: 4;
  margin-top: 10px;
  font-size: 1.1em;
  color: #435f7a;
  opacity: 0.5;
  cursor: pointer;
}
@media screen and (max-width: 735px) {
  #frame .content .message-input .wrap .attachment {
    margin-top: 17px;
    right: 65px;
  }
}
#frame .content .message-input .wrap .attachment:hover {
  opacity: 1;
}
#frame .content .message-input .wrap button {
  float: right;
  border: none;
  width: 50px;
  padding: 12px 0;
  cursor: pointer;
  background: #32465a;
  color: #f5f5f5;
}
@media screen and (max-width: 735px) {
  #frame .content .message-input .wrap button {
    padding: 16px 0;
  }
}
#frame .content .message-input .wrap button:hover {
  background: #435f7a;
}
#frame .content .message-input .wrap button:focus {
  outline: none;
}
    </style>
@endsection
@section('content')




@section('heading', 'Support')
<div class="container-fluid" id="dashboard_page">
    <div id="frame">
        <div class="content">
            <div class="contact-profile">
                <img id="chatUserImage" src="{{ asset('assets/admin/images/Image.png') }}" alt="" />
                <p id="chatUserName"> </p>

            </div>
            <div class="messages">
                <ul id="chat_messages">

                </ul>
            </div>
            <div class="message-input">
                <div class="wrap">
                    <input id="messageInput" type="text" placeholder="Write your message..." />

                    <button id="sendMessageButton"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                </div>
            </div>
        </div>
        <div id="sidepanel">
            <div id="profile">
                <div class="wrap">
                    <span>Chat</span>
                </div>
            </div>
            <div id="search">
                <label for=""><i class="fa fa-search" aria-hidden="true"></i></label>
                <input type="text" placeholder="Search contacts..." id="searchInput" />
            </div>
            <div id="contacts">
                <ul id="chat_user_list">
                    @include('admin.components.chat_users_list')
                </ul>
            </div>

        </div>

    </div>
</div>


@endsection
@section('script')
<script>
    $(".messages").animate({
        scrollTop: $(document).height()
    }, "fast");

    $("#profile-img").click(function() {
        $("#status-options").toggleClass("active");
    });

    $(".expand-button").click(function() {
        $("#profile").toggleClass("expanded");
        $("#contacts").toggleClass("expanded");
    });

    $("#status-options ul li").click(function() {
        $("#profile-img").removeClass();
        $("#status-online").removeClass("active");
        $("#status-away").removeClass("active");
        $("#status-busy").removeClass("active");
        $("#status-offline").removeClass("active");
        $(this).addClass("active");

        if ($("#status-online").hasClass("active")) {
            $("#profile-img").addClass("online");
        } else if ($("#status-away").hasClass("active")) {
            $("#profile-img").addClass("away");
        } else if ($("#status-busy").hasClass("active")) {
            $("#profile-img").addClass("busy");
        } else if ($("#status-offline").hasClass("active")) {
            $("#profile-img").addClass("offline");
        } else {
            $("#profile-img").removeClass();
        };

        $("#status-options").removeClass("active");
    });

    function newMessage() {
        message = $(".message-input input").val();
        if ($.trim(message) == '') {
            return false;
        }
        $('<li class="sent"><img src="http://emilcarlsson.se/assets/mikeross.png" alt="" /><p>' + message + '</p></li>')
            .appendTo($('.messages ul'));
        $('.message-input input').val(null);
        $('.contact.active .preview').html('<span>You: </span>' + message);
        $(".messages").animate({
            scrollTop: $(document).height()
        }, "fast");
    };

    $('.submit').click(function() {
        newMessage();
    });

    $(window).on('keydown', function(e) {
        if (e.which == 13) {
            newMessage();
            return false;
        }
    });
</script>
<script>
    $(document).ready(function() {
        let chatInterval;
        const firstContact = $('#chat_user_list .contact').first();
        // Search Users
        $('#searchInput').on('input', function() {
            let query = $(this).val();
            $('#chat_user_list').html(''); // Update the user list dynamically

            $.ajax({
                url: "{{ route('chat.support') }}",
                type: 'GET',
                data: {
                    q: query
                },
                success: function(response) {
                    $('#chat_user_list').html(response
                        .html); // Update the user list dynamically
                },
                error: function() {
                    $('#chat_user_list').html('<li>Error fetching users.</li>');
                }
            });
        });

        if (firstContact.length) {
            const userId = firstContact.data('user-id');
            console.log(userId);

            const contactName = $('#user_name' + userId).text();
            const contactImage = $('#user_image' + userId).attr('src');



            // Set the first contact as active
            firstContact.addClass('active');

            // Load chat messages for the first contact
            loadChat(userId, contactName, contactImage);

            chatInterval = setInterval(function() {
                loadChat(userId, contactName, contactImage);
            }, 2000); // 5000ms = 5 seconds
        }


        function loadChat(userId, contactName, contactImage) {


            // Set the contact's name and image in the chat header
            $('#chatUserName').text(contactName);
            $('#chatUserImage').attr('src', contactImage);

            // Fetch chat messages for the selected user
            $.ajax({
                url: "{{ route('chat.chat') }}",
                type: 'GET',
                data: {
                    id: userId
                },
                success: function(response) {


                    $('#chat_messages').empty();
                    $('#chat_messages').html(response
                        .html); // Update the user list dynamically


                },
                error: function() {
                    $('#chat_messages').empty();
                }
            });
        }
        $('#chat_user_list').on('click', '.contact', function() {
            // Remove 'active' class from previously selected contact
            $('#chat_user_list .contact').removeClass('active');

            // Add 'active' class to the currently selected contact
            $(this).addClass('active');

            // Get the user ID, name, and profile image of the clicked contact
            const userId = $(this).data('user-id');
            const contactName = $('#user_name' + userId).text();
            const contactImage = $('#user_image' + userId).attr('src')
            if (chatInterval) {
                clearInterval(chatInterval);
            }
            // Load chat messages for the selected user
            loadChat(userId, contactName, contactImage);
            chatInterval = setInterval(function() {
                loadChat(userId, contactName, contactImage);
            }, 2000); // 5000ms = 5 seconds
        });
        $('#sendMessageButton').on('click', function() {

            const userId = $('#chat_user_list .contact.active').data(
                'user-id'); // Get the active user ID
            const message = $('#messageInput').val(); // Get the message from the input field

            if (message.trim() !== '') {
                $.ajax({
                    url: "{{ route('chat.sendMessage') }}", // Make sure to adjust the route to handle the message sending
                    type: 'POST',
                    data: {
                        user_id: userId,
                        message: message,
                        _token: $('meta[name="csrf-token"]').attr('content') // CSRF token
                    },
                    success: function(response) {
                        // Optionally, you can append the new message to the chat
                        $('#chat_messages').append(
                            '<li class="replies"><span>You</span><p>' +
                            message + '</p></li>');
                        $('#messageInput').val(''); // Clear the input field
                    },
                    error: function() {
                        alert('Error sending message');
                    }
                });
            }

        });
    });
</script>
@endsection
