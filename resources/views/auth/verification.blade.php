        <!doctype html>
        <html>

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            @vite('resources/css/app.css')
        </head>

        <body class="min-h-screen bg-no-repeat bg-cover bg-center"
            style="background-image: url('https://images.unsplash.com/photo-1486520299386-6d106b22014b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80')">
            <div class="flex justify-end">
                <div class="bg-white min-h-screen w-1/2 flex justify-center items-center">
                    <div>

                        <form method="post" id="verificationForm">
                            @csrf

                            <div>   
                                <h1 class="text-2xl font-bold">Enter your otp</h1>
                            </div>

                            <div class="my-3">
                                <input class="px-4 w-full border-2 py-2 rounded-md text-sm outline-none" type="hidden" name="email" value="{{ $email }}">   
                            </div>

                            <div class="mt-5">
                                <input class="px-4 w-full border-2 py-2 rounded-md text-sm outline-none" 
                                type="number" name="otp" placeholder="Enter OTP" required>
                            </div>

                            <p id="message_error" style="color:red;"></p>
                            <p id="message_success" style="color:green;"></p>

                            <div class="flex justify-between pt-4">
                            </div>
                            <div class="">
                                <button class="mt-4 mb-3 w-full bg-green-500 hover:bg-green-400 text-white py-2 rounded-md transition duration-100"
                                    id="loginbutton">Verify</button>
                            </div>
                        </form>
                        <button class="mt-4 mb-3 w-full bg-green-500 hover:bg-green-400 text-white py-2 rounded-md transition duration-100"  id="resendOtpVerification">Resend Verification OTP</button>
                    </div>
                </div>
            </div>
            </div>
        </body>

        </html>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

        <script>

            $(document).ready(function(){
                $('#verificationForm').submit(function(e){
                    e.preventDefault();

                    var formData = $(this).serialize();

                    $.ajax({
                        url:"{{ route('verifiedOtp') }}",
                        type:"POST",
                        data: formData,
                        success:function(res){
                            if(res.success){
                                alert(res.msg);
                                window.open("/","_self");
                            }
                            else{
                                $('#message_error').text(res.msg);
                                setTimeout(() => {
                                    $('#message_error').text('');
                                }, 3000);
                            }
                        }
                    });

                });

                $('#resendOtpVerification').click(function(){
                    $(this).text('Wait...');
                    var userMail = @json($email);

                    $.ajax({
                        url:"{{ route('resendOtp') }}",
                        type:"GET",
                        data: {email:userMail },
                        success:function(res){
                            $('#resendOtpVerification').text('Resend Verification OTP');
                            if(res.success){
                                timer();
                                $('#message_success').text("Otp sent successfully");
                                setTimeout(() => {
                                    $('#message_success').text('');
                                }, 3000);
                            }   
                        }
                    });

                });
            });
        </script> 