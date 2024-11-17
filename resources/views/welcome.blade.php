<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex h-screen">
  <!-- Main Content Area -->
  <div class="flex-1 flex flex-col max overflow-auto">
    <div class="p-6">
     
        <div class="fixed inset-0 flex items-center justify-center z-50">
        
        <div class="bg-white rounded-lg shadow-lg p-8 w-96">
            <h2 class="text-2xl font-semibold mb-4 text-center">TOURS MGT</h2>

            <div class="mb-4 text-center">
                <a href="{{ route('login') }}" class="w-full bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-600">Login</a>
            </div>
     
        </div>

    </div>
    </div>
  </div>
</body>
</html>


