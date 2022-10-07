@if (request()->session()->has('notif-y'))
    <br>
    <notification>
        <div class="mt-5 mt-lg-2 shadow">
            <div class="mt-0 mb-0 text-capitalize text-center text-break text-light fw-bold alert alert-success" role="alert">
                {{ session('notif-y') }}
            </div>
        </div>
    </notification>
@elseif (request()->session()->has('notif-x'))
<br>
<notification>
    <div class="mt-5 mt-lg-2 shadow">
        <div class="mt-0 mb-0 text-capitalize text-center text-break text-light fw-bold alert alert-danger" role="alert">
            {{ session('notif-x') }}
        </div>
    </div>
</notification>
@endif