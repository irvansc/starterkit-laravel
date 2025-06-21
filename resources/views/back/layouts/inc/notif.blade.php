<div class="dropdown d-inline-block">
    <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown"
        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="mdi mdi-bell-outline"></i>
        <span class="badge rounded-pill bg-danger ">1</span>
    </button>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
        aria-labelledby="page-header-notifications-dropdown">
        <div class="p-3">
            <div class="row align-items-center">
                <div class="col">
                    <h6 class="m-0"> Notifications </h6>
                </div>
                <div class="col-auto">
                    <a href="#!" class="small"> View All</a>
                </div>
            </div>
        </div>
        <div data-simplebar style="max-height: 230px;">
            {{-- @foreach ($allMessages as $message)
                @if (isset($message->comment))
                    <a href="{{ route('comments') }}" class="text-reset notification-item">
                    @else
                        <a href="{{ route('inbox') }}" class="text-reset notification-item">
                @endif
                <div class="d-flex align-items-start">
                    <div class="avatar-xs me-3">
                        <span class="avatar-title bg-primary rounded-circle font-size-16">
                            @if (isset($message->comment))
                                <i class="mdi mdi-comment-text-multiple"></i>
                            @else
                                <i class="mdi mdi-bell-outline"></i>
                            @endif
                        </span>
                    </div>
                    <div class="flex-1">
                        <h6 class="mt-0 mb-1">{{ $message->name ?? $message->username }}</h6>
                        <div class="font-size-12 text-muted">
                            <p class="mb-1">{{ Str::limit($message->pesan ?? $message->comment, 100) }}</p>
                            <p class="mb-0"><i class="mdi mdi-clock-outline"></i>
                                {{ $message->created_at }}
                            </p>
                        </div>
                    </div>
                </div>
                </a>
            @endforeach --}}
        </div>
    </div>
</div>
