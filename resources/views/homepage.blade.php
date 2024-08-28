@include('components.header')


    @if (session()->has('success'))
        <div class=" container container--narrow">

            <div class="alert alert-success text-center">
                {{session('success')}}

            </div>

        </div>

    @else
    <div class=" container container--narrow">

        <div class="alert alert-danger text-center">
            <p>failed</p>

        </div>

    </div>
    @endif

    <div class="container py-md-5 container--narrow">
        <div class="text-center">
            <h1>Hello <strong>{{auth()->user()->username}}</strong>, your feed is empty.</h1>
        </div>
    </div>

      <!-- Main content -->
      <div class="container mt-4">
        <h1>Welcome to Your Dashboard</h1>
        <p>This is where you can manage your account and settings.</p>

        <!-- Example of a dashboard card -->
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Profile</h5>
                        <p class="card-text">Manage your personal information and change your password.</p>
                        <a href="#" class="btn btn-primary">Go to Profile</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Settings</h5>
                        <p class="card-text">Update your preferences and account settings.</p>
                        <a href="#" class="btn btn-primary">Go to Settings</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Messages</h5>
                        <p class="card-text">Check your inbox and send messages to support.</p>
                        <a href="#" class="btn btn-primary">Go to Messages</a>
                    </div>
                </div>
            </div>
        </div>
    </div>



@include('components.footer')
