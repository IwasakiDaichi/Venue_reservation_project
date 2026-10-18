
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CPDO Dashboard</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            color: #1f2937;
        }

        header {
            background: #17365d;
            color: white;
            padding: 22px 32px;
        }

        header h1 {
            margin: 0 0 6px;
        }

        header p {
            margin: 0;
            color: #dbeafe;
        }

        main {
            max-width: 1200px;
            margin: auto;
            padding: 28px 24px;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 18px;
            margin-bottom: 28px;
        }

        .stat-card, .panel {
            background: white;
            padding: 22px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .stat-card p {
            margin: 0 0 12px;
            color: #64748b;
        }

        .stat-card h2 {
            margin: 0;
            font-size: 30px;
        }

        .panel h2 {
            margin-top: 0;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 650px;
        }

        th, td {
            text-align: left;
            padding: 14px 12px;
            border-bottom: 1px solid #e5e7eb;
        }

        th {
            color: #64748b;
            font-size: 13px;
            text-transform: uppercase;
        }

        .status {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            background: #fef3c7;
            color: #92400e;
            font-size: 12px;
            font-weight: bold;
        }

        .logout {
            display: inline-block;
            margin-top: 20px;
            background: white;
            color: #17365d;
            padding: 10px 16px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
        }

        .logout:hover {
            background: #eaf0f7;
        }

        @media (max-width: 800px) {
            .stats {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 480px) {
            .stats {
                grid-template-columns: 1fr;
            }

            main {
                padding: 20px 14px;
            }
        }
    </style>
</head>

<body>
    <header>
        <h1>CPDO Dashboard</h1>
        <p>Venue Reservation Management System</p>
    </header>

    <main>
        <h2>Welcome, {{ auth()->user()->name }}</h2>
        <p>Here is an overview of the venue reservations.</p>

        <section class="stats">
            <div class="stat-card">
                <p>Total Reservations</p>
                <h2>{{ $totalReservations }}</h2>
            </div>

            <div class="stat-card">
                <p>Pending Requests</p>
                <h2>{{ $pendingReservations }}</h2>
            </div>

            <div class="stat-card">
                <p>Approved Reservations</p>
                <h2>{{ $approvedReservations }}</h2>
            </div>

            <div class="stat-card">
                <p>Rejected Reservations</p>
                <h2>{{ $rejectedReservations }}</h2>
            </div>
        </section>

        <section class="panel">
            <h2>Recent Reservations</h2>

            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Applicant</th>
                            <th>Venue</th>
                            <th>Reserved Date</th>
                            <th>Purpose</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($recentReservations as $reservation)
                            <tr>
                                <td>{{ $reservation->id }}</td>
                                <td>{{ $reservation->name }}</td>
                                <td>{{ $reservation->venue === 'Other'
                                    ? $reservation->other_venue
                                    : $reservation->venue }}</td>
                                <td>{{ $reservation->reserved_date }}</td>
                                <td>{{ $reservation->purpose }}</td>
                                <td>
                                    <span class="status">
                                        {{ ucfirst($reservation->status) }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">
                                    No reservations have been submitted yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="logout" type="submit">Log Out</button>
        </form>
    </main>
</body>
</html>
