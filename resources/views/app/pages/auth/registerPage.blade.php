<x-layout.guest-layout>

    <form action="{{route('register.Function')}}"  method="post">
        @csrf
        <main class="flex flex-col justify-center items-center gap-3 py-4 ">
            <div>
                <h4>Register</h4>
            </div>
            {{-- @if (!empty($errors))
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors as $fieldErrors)
                        @foreach ($fieldErrors as $error)
                            <li class="text-red">{{ $error }}</li>
                        @endforeach
                    @endforeach
                </ul>
            </div>
        @endif --}}


            {{-- message parsing error from server --}}
            @if (Session('error'))
                <p class="text-white bg-red-500 p-1 rounded-md flex flex-row">{{Session('error')}}</p>
            @endif

        
            {{-- check errors --}}
            
            <div class="flex flex-col justify-start w-1/2">
                <label for="name">Name</label>
                <input type="text" class="rounded-md p-1 border focus:outline-green-500 " name="name" id="name">
                @error('name')
                    <div><p class="text-red-500">{{$message}}</p></div>   
                @enderror
            </div>

            <div class="flex flex-col justify-start w-1/2">
                <label for="email">Email</label>
                <input type="email" class="rounded-md p-1 border focus:outline-green-500 " name="email" id="email">
                @error('email')
                    <div><p class="text-red-500">{{$message}}</p></div>    
                @enderror
            </div>

            <div class="flex flex-col justify-start w-1/2">
                <label for="password">Password</label>
                <input type="password"  name="password" class="rounded-md p-1 border focus:outline-green-500" id="password">
               
                @error('password')
                    <div><p class="text-red-500">{{$message}}</p></div>   
                @enderror
            </div>

            <div class="flex flex-col gap-2 w-1/2">
                <button type="submit" class="text-white bg-green-500 font-bold rounded-md p-1 ">Register</button>

                <a href="/" class="font-semibold flex flex-row">Already have an account? <p class="text-green-500"> Login</p></a>
            </div>
        </main>
    </form>
</x-layout.guest-ayout>