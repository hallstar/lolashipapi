<div>
    <section class="min-h-screen">
        <div class="container mx-auto bg-white shadow rounded p-4">
        <form wire:submit.prevent="submit">
            <p class="font-bold text-gray-800 text-center">Register</p>
            
            <div class="flex">
                <div class="flex flex-col w-1/2 mr-3">
                    <div class="flex flex-col my-3">
                        <label for="companyName" class="text-sm font-bold text-gray-600">Company Name</label>
                        <input class="input @error('company') input-error @enderror" type="text" placeholder="Example Inc." wire:model.lazy="company">
                        @error('company')<div class="form-error">{{$message}}</div>@enderror
                    </div>
                    <div class="flex flex-col my-3">
                        <label for="firstName"  class="text-sm font-bold text-gray-600">First Name</label>
                        <input class="input @error('firstname') input-error @enderror" type="text" placeholder="John" wire:model.lazy="firstname">
                        @error('firstname')<div class="form-error">{{$message}}</div>@enderror
                    </div>
                    <div class="flex flex-col my-3">
                        <label for="email" class="text-sm font-bold text-gray-600">Email</label>
                        <input class="input @error('email') input-error @enderror" type="text" placeholder="example@gmail.com" wire:model.lazy="email">
                        @error('email')<div class="form-error">{{$message}}</div>@enderror
                    </div>
                </div>
                <div class="flex flex-col w-1/2 mr-3">
                    <div class="flex flex-col my-3">
                        <label for="domain" class="text-sm font-bold text-gray-600">Wesbite</label>
                        <div class="flex w-full justify-center items-center">
                            <input class="input @error('subdomain') input-error @enderror w-9/12" wire:model="subdomain" type="text" style="text-align: end; padding-right: 2px;" placeholder="sitename">
                            <div class="domain-box" style="margin-top: 5px;">
                                <span class="w-4/12">.lolaship.com</span>
                            </div>
                        </div>
                        @error('subdomain')<div class="form-error">{{$message}}</div>@enderror
                    </div>
                    <div class="flex flex-col my-3">
                        <label for="firstName" class="text-sm font-bold text-gray-600">Last Name</label>
                        <input class="input @error('lastname') input-error @enderror" type="text" placeholder="Brown" wire:model.lazy="lastname">
                        @error('lastname')<div class="form-error">{{$message}}</div>@enderror
                    </div>
                    <div class="flex flex-col my-3">
                        <label for="password" class="text-sm font-bold text-gray-600">Password</label>
                        <input class="input @error('password') input-error @enderror" type="password" wire:model.lazy="password">
                        @error('password')<div class="form-error">{{$message}}</div>@enderror
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
                <button class="btn btn-primary btn-large" wire:loading.attr="disabled" wire:loading.class="btn-grey">Get Started</button>
            </div>
           
        </form>
        </div>
    </section>
</div>
