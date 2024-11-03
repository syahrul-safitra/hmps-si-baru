<!doctype html>
<html data-theme='cupcake'>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')

</head>

<body>

    {{-- <div class="w-full bg-red-400 flex justify-center items-center"> --}}
    <div class="w-full min-h-screen flex flex-col items-center justify-center ">
        <div class="card bg-base-100 shadow-xl">
            <div class="avatar flex justify-center pt-4">
                <div class="w-24 rounded-full">
                    <img src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp" />
                </div>
            </div>

            <div class="card-body">

                <h2 class="card-title">Login</h2>
                <form action="{{ url('login') }}" method="POST">
                    @csrf

                    @if (session()->has('loginFailed'))
                        <div role="alert" class="alert alert-error">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current"
                                fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>{{ session('loginFailed') }}</span>
                        </div>
                    @endif

                    <label class="form-control w-full ">
                        <div class="label">
                            <span class="label-text">email</span>
                        </div>
                        <input type="text" placeholder="Type here" name="email" value="{{ @old('email') }}"
                            class="input input-bordered w-full @error('email') input-error @enderror" />
                        @error('email')
                            <div class="label">
                                <span class="label-text-alt text-red-600">{{ $message }}</span>
                            </div>
                        @enderror
                    </label>

                    <label class="form-control w-full ">
                        <div class="label">
                            <span class="label-text">password</span>
                        </div>
                        <input type="password" placeholder="Type here" name="password" value="{{ @old('password') }}"
                            class="input input-bordered w-full @error('password') input-error @enderror" />
                        @error('password')
                            <div class="label">
                                <span class="label-text-alt text-red-600">{{ $message }}</span>
                            </div>
                        @enderror
                    </label>

                    <div class="form-control flex mt-4">

                        <button class="btn btn-info">Login</button>

                    </div>

                </form>
            </div>
        </div>
    </div>

</body>

</html>
