<div>
    <div class="user-img">
        <img src="{{ Auth::user()->image }}" alt="" class="avatar-md mx-auto rounded-circle">
    </div>

    <div class="mt-3">
        <a href="#" class="text-body fw-medium font-size-16">{{ Auth::user()->name }}</a>
    </div>
</div>
