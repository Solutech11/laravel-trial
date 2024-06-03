<x-layout.guest-layout>

    
    <form action="{{route('login.Function')}}"  method="post">
        @csrf
        <main class="flex flex-col justify-center items-center gap-3 py-4 ">
            <div>
                <h4>Login</h4>
            </div>

                <div class="flex flex-col justify-start w-1/2">
                    <label for="email">Email</label>
                    <input type="email" class="rounded-md p-1 border focus:outline-green-500 " name="email" id="email">
                </div>

                <div class="flex flex-col justify-start w-1/2">
                    <label for="password">Password</label>
                    <input type="password"  name="password" class="rounded-md p-1 border focus:outline-green-500" id="password">
                </div>

                <div class="flex flex-col gap-2 w-1/2">
                    <button class="text-white bg-green-500 font-bold rounded-md p-1 ">Login</button>
                    <a href="/register" class="text-green-500 font-semibold">Create an account</a>
                </div>

        </main>
    </form>

</x-layout.guest-ayout>