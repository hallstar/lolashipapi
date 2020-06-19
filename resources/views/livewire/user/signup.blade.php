<div>
    <section class="min-h-screen">
        <div class="container mx-auto bg-white shadow rounded p-4">
            <p class="font-bold text-gray-800 text-center">Register</p>
            <div class="flex">
                <div class="flex flex-col w-1/2 mr-3">
                    <div class="flex flex-col my-3">
                        <label for="companyName" class="text-sm font-bold text-gray-600">Company Name</label>
                        <input class="input" type="text" placeholder="Example Inc." name="companyName">
                    </div>
                    <div class="flex flex-col my-3">
                        <label for="firstName" class="text-sm font-bold text-gray-600">First Name</label>
                        <input class="input" type="text" placeholder="John" name="firstName">
                    </div>
                    <div class="flex flex-col my-3">
                        <label for="email" class="text-sm font-bold text-gray-600">Email</label>
                        <input class="input input-error" type="text" placeholder="example@gmail.com" name="email">
                        <div class="form-error">Please enter this field</div>
                    </div>
                </div>
                <div class="flex flex-col w-1/2 mr-3">
                    <div class="flex flex-col my-3">
                        <label for="domain" class="text-sm font-bold text-gray-600">Domain</label>
                        <div class="flex w-full justify-center items-center">
                            <input class="input input-error w-9/12" type="text" placeholder="mywebsite" style="text-align: end; padding-right: 2px;" name="domain">
                            <div class="domain-box" style="margin-top: 5px;">
                                <span class="w-4/12">.lolaship.com</span>
                            </div>
                        </div>
                        <div class="form-error">Please enter this field</div>
                    </div>
                    <div class="flex flex-col my-3">
                        <label for="firstName" class="text-sm font-bold text-gray-600">Last Name</label>
                        <input class="input" type="text" placeholder="Brown" name="firstName">
                    </div>
                    <div class="flex flex-col my-3">
                        <label for="password" class="text-sm font-bold text-gray-600">Password</label>
                        <input class="input" type="password" name="email">
                    </div>
                </div>
            </div>
            <div class="flex flex-col mt-3">
                <p class="text-sm text-gray-700 font-bold">Please agree to the following</p>
                <div class="flex items-center my-1">
                    <input class="input mr-3" type="checkbox" placeholder="Example Inc." name="companyName">
                    <label for="companyName" class="text-sm mt-1 font-thin text-gray-600">Privacy Policy</label>
                </div>
                <div class="flex items-center my-1">
                    <input class="input mr-3" type="checkbox" placeholder="Example Inc." name="companyName">
                    <label for="companyName" class="text-sm mt-1  font-thin text-gray-600">Terms of Service</label>
                </div>
                <div class="flex items-center my-1">
                    <input class="input mr-3" type="checkbox" placeholder="Example Inc." name="companyName">
                    <label for="companyName" class="text-sm mt-1 font-thin text-gray-600">Refund Policy</label>
                </div>
            </div>
            <div class="flex my-2 justify-center">
                <button class="btn btn-primary btn-large">Get Started</button>
            </div>
        </div>
    </section>
</div>
