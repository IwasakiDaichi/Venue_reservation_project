<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Student Dashboard</title>

    @vite(['resources/css/app.css', 'resources/js/app.tsx'])
</head>

<body class="bg-gray-100 text-gray-800">

    <div class="min-h-screen flex">

        <!-- Sidebar -->
        <aside class="w-64 bg-white border-r border-gray-200 flex flex-col">

            <!-- Logo / System Name -->
            <div class="px-6 py-5 border-b border-gray-200">
                <h1 class="text-xl font-bold text-gray-800">
                    CPDO
                </h1>

                <p class="text-sm text-gray-500">
                    Venue Reservation
                </p>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 px-4 py-6">

                <p class="px-3 mb-2 text-xs font-semibold text-gray-400 uppercase">
                    Menu
                </p>

                <a
                    href="{{ route('student.dashboard') }}"
                    class="flex items-center px-3 py-2 mb-1 rounded-lg bg-gray-100 text-gray-900 font-medium"
                >
                    Dashboard
                </a>

                <a
                    href="#"
                    class="flex items-center px-3 py-2 mb-1 rounded-lg text-gray-600 hover:bg-gray-100 hover:text-gray-900"
                >
                    My Reservations
                </a>

                <a
                    href="/reservation/create"
                    class="flex items-center px-3 py-2 rounded-lg text-gray-600 hover:bg-gray-100 hover:text-gray-900"
                >
                    New Reservation
                </a>

            </nav>

            <!-- Logout -->
            <div class="px-4 py-4 border-t border-gray-200">

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button
                        type="submit"
                        class="w-full text-left px-3 py-2 rounded-lg text-gray-600 hover:bg-gray-100 hover:text-gray-900"
                    >
                        Logout
                    </button>
                </form>

            </div>

        </aside>


        <!-- Main Content -->
        <main class="flex-1">

            <!-- Top Bar -->
            <header class="bg-white border-b border-gray-200 px-8 py-5">

                <div class="flex items-center justify-between">

                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">
                            Student Dashboard
                        </h2>

                        <p class="text-sm text-gray-500 mt-1">
                            Manage your venue reservations
                        </p>
                    </div>

                    <div class="text-right">
                        <p class="font-medium text-gray-800">
                            {{ auth()->user()->name }}
                        </p>

                        <p class="text-sm text-gray-500">
                            Student
                        </p>
                    </div>

                </div>

            </header>


            <!-- Dashboard Content -->
            <div class="p-8">

                <!-- Welcome -->
                <div class="mb-8">

                    <h3 class="text-xl font-semibold text-gray-800">
                        Welcome, {{ auth()->user()->name }}
                    </h3>

                    <p class="text-gray-500 mt-1">
                        Here is an overview of your venue reservations.
                    </p>

                </div>


                <!-- Summary Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

                    <!-- Pending -->
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">

                        <p class="text-sm text-gray-500">
                            Pending
                        </p>

                        <p class="text-3xl font-bold text-gray-800 mt-2">
                            {{ $reservations->where('status', 'pending')->count() }}
                        </p>

                    </div>


                    <!-- Approved -->
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">

                        <p class="text-sm text-gray-500">
                            Approved
                        </p>

                        <p class="text-3xl font-bold text-gray-800 mt-2">
                            {{ $reservations->where('status', 'approved')->count() }}
                        </p>

                    </div>


                    <!-- Disapproved -->
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">

                        <p class="text-sm text-gray-500">
                            Disapproved
                        </p>

                        <p class="text-3xl font-bold text-gray-800 mt-2">
                            {{ $reservations->where('status', 'disapproved')->count() }}
                        </p>

                    </div>

                </div>


                <!-- Reservations -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200">

                    <!-- Section Header -->
                    <div class="px-6 py-5 border-b border-gray-200 flex items-center justify-between">

                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">
                                My Reservations
                            </h3>

                            <p class="text-sm text-gray-500 mt-1">
                                Your submitted venue reservations
                            </p>
                        </div>

                        <a
                            href="/reservation/create"
                            class="px-4 py-2 rounded-lg bg-gray-900 text-white text-sm font-medium hover:bg-gray-700"
                        >
                            + New Reservation
                        </a>

                    </div>


                    <!-- Reservation List -->
                    <div class="overflow-x-auto">

                        @if ($reservations->count() > 0)

                            <table class="w-full text-left">

                                <thead class="bg-gray-50 border-b border-gray-200">

                                    <tr>
                                        <th class="px-6 py-4 text-sm font-semibold text-gray-600">
                                            Venue
                                        </th>

                                        <th class="px-6 py-4 text-sm font-semibold text-gray-600">
                                            Date
                                        </th>

                                        <th class="px-6 py-4 text-sm font-semibold text-gray-600">
                                            Time
                                        </th>

                                        <th class="px-6 py-4 text-sm font-semibold text-gray-600">
                                            Status
                                        </th>

                                        <th class="px-6 py-4 text-sm font-semibold text-gray-600">
                                            Action
                                        </th>
                                    </tr>

                                </thead>


                                <tbody class="divide-y divide-gray-200">

                                    @foreach ($reservations as $reservation)

                                        <tr class="hover:bg-gray-50">

                                            <td class="px-6 py-4">
                                                <p class="font-medium text-gray-800">
                                                    {{ $reservation->venue }}
                                                </p>
                                            </td>

                                            <td class="px-6 py-4 text-gray-600">
                                                {{ $reservation->reserved_date }}
                                            </td>

                                            <td class="px-6 py-4 text-gray-600">
                                                {{ $reservation->time }}
                                            </td>

                                            <td class="px-6 py-4">

                                                @if ($reservation->status === 'pending')

                                                    <span class="inline-flex px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-700">
                                                        Pending
                                                    </span>

                                                @elseif ($reservation->status === 'approved')

                                                    <span class="inline-flex px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">
                                                        Approved
                                                    </span>

                                                @elseif ($reservation->status === 'disapproved')

                                                    <span class="inline-flex px-3 py-1 rounded-full text-xs font-medium bg-red-100 text-red-700">
                                                        Disapproved
                                                    </span>

                                                @else

                                                    <span class="inline-flex px-3 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-600">
                                                        {{ ucfirst($reservation->status) }}
                                                    </span>

                                                @endif

                                            </td>

                                            <td class="px-6 py-4">

                                                <a
                                                    href="#"
                                                    class="text-sm font-medium text-gray-700 hover:text-gray-900"
                                                >
                                                    View
                                                </a>

                                            </td>

                                        </tr>

                                    @endforeach

                                </tbody>

                            </table>

                        @else

                            <!-- No Reservations -->
                            <div class="px-6 py-12 text-center">

                                <h3 class="text-lg font-medium text-gray-800">
                                    No reservations yet
                                </h3>

                                <p class="text-sm text-gray-500 mt-1">
                                    You haven't submitted a venue reservation.
                                </p>

                                <a
                                    href="/reservation/create"
                                    class="inline-block mt-5 px-4 py-2 rounded-lg bg-gray-900 text-white text-sm font-medium hover:bg-gray-700"
                                >
                                    Make a Reservation
                                </a>

                            </div>

                        @endif

                    </div>

                </div>

            </div>

        </main>

    </div>

</body>
</html>