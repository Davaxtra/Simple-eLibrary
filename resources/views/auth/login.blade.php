<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/66da7cedb6.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.7.0/alpine-ie11.js" defer></script>
    @vite('resources/css/app.css')
    <title>Library</title>
</head>

<body class="py-4 px-4">
    <!-- https://play.tailwindcss.com/MIwj5Sp9pw -->
    <div class="py-40">
        <form action="{{ route('auth.authenticate') }}" method="POST">
            @csrf
            <div class="flex bg-white rounded-lg shadow-lg overflow-hidden mx-auto max-w-sm lg:max-w-4xl">
                <div class="hidden lg:block lg:w-1/2 bg-cover" style="background-image:url('https://media.istockphoto.com/id/678839470/id/foto/perpustakaan.jpg?s=612x612&w=0&k=20&c=BQtqN65dYcJE3d2s032kiTBFBTI74Nc-13lzqsSctIs=">
                </div>
                <div class="w-full p-8 lg:w-1/2">
                    <h2 class="text-2xl font-semibold text-gray-700 text-center">E-Library</h2>
                    <p class="text-xl text-gray-600 text-center">Welcome back!</p>

                    <div class="mt-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Username</label>
                        <input class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none @error('email') is-invalid @enderror" value="{{ old('username') }}" id="username" name="username" type="text" />
                        @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <div class="flex justify-between">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                        </div>
                        <input class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none @error('password') is-invalid @enderror" name="password" id="password" type="password" />
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mt-8">
                        <button class="bg-blue-500 text-white font-bold py-2 px-4 w-full rounded hover:bg-blue-600" type="submit">Login</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>