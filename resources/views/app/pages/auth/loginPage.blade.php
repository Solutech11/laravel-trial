<x-layout.guest-layout>

    
    <form action="{{route('login.Function')}}"  method="post">
        @csrf
        <main class="flex flex-col justify-center items-center gap-3 py-4 ">
            <div>
                <h4>Login</h4>
            </div>



            {{-- message parsing from server --}}
            @if (Session('success'))
                <p class="text-green-500 p-2 rounded-md fle">{{Session('success')}}</p>
            @endif

            {{-- message parsing from server --}}
            @if (Session('error'))
                <p class="text-red-500 p-2 rounded-md fle">{{Session('error')}}</p>
            @endif
            
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
                    <button class="text-white bg-green-500 font-bold rounded-md p-1 ">Login</button>
                    <a href="/register" class="text-green-500 font-semibold">Create an account</a>
                </div>

        </main>
    </form>

</x-layout.guest-ayout>