@extends('layouts.admin')

@section('content')

<!-- BEGIN: Content -->
<div class="content">
    @if (session()->has('success'))
    <div class="flash-message absolute left-1/2 transform -translate-x-1/2 bg-green-600 bg-opacity-75 p-4 w-1/2 text-white">
        {{ session()->get('success') }}
    </div>
    @endif
    @if (session()->has('error'))
    <div class="flash-message absolute left-1/2 transform -translate-x-1/2 bg-red-600 bg-opacity-75 p-4 w-1/2 text-white">
        {{ session()->get('error') }}
    </div>
    @endif
    <h2 class="intro-y text-lg font-medium mt-10">
        Activity List
    </h2>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-8 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="{{ route('activities.create') }}" class="btn btn-primary shadow-md mr-2">Add New Activity</a>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto">
                <div class="w-56 relative text-slate-500">
                    
                </div>
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-8 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">ACTIVITY NAME</th>
                        <th class="whitespace-nowrap">USERNAME</th>
                        <th class="text-center whitespace-nowrap">TASK COUNT</th>
                        <th class="text-center whitespace-nowrap">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($activities as $activity )

                    <tr class="intro-x">
                        <td>
                            <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">{{$activity->name}}</div>
                        </td>
                        <td>
                            <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">{{$activity->user->name}}</div>
                        </td>
                        <td class="w-40">
                            <div class="text-slate-500 text-xs ml-10 whitespace-nowrap mt-0.5">{{ $activity->tasks->count() > 0 ? $activity->tasks->count() : '0' }}</div>
                        </td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center mr-3" href="{{ route('activities.edit', $activity->id) }}"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                <a class="flex items-center text-danger" href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal"> <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                            </div>
                        </td>
                    </tr>
                    @empty
                     <p>No records</p>
                    @endforelse
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
        <!-- BEGIN: Pagination -->
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            <nav class="w-full sm:w-auto sm:mr-auto">
                <ul class="pagination">
                    <li class="page-item">
                        {{-- {{ $activities->links() }} --}}
                    </li>
                </ul>
            </nav>
        </div>
        <!-- END: Pagination -->
    </div>
    <!-- BEGIN: Delete Confirmation Modal -->
    <div id="delete-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center">
                        <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                        <div class="text-3xl mt-5">Are you sure?</div>
                        <div class="text-slate-500 mt-2">
                            Do you really want to delete these records?
                            <br>
                            This process cannot be undone.
                        </div>
                    </div>
                    <div class="flex justify-center px-5 pb-8 text-center">
                        <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24">Cancel</button>

                        <form action="{{ isset($activity->id) ? route('activities.destroy', $activity->id) : '#' }}" method="POST">
                            @auth
                                @csrf
                                @method('DELETE')
                                <button type='submit' class="btn btn-danger w-24 ml-2">
                                    Delete
                                </button>
                            @endauth
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Delete Confirmation Modal -->
</div>
<!-- END: Content -->
</div>

<script>
    $(document).ready(function() {
        setTimeout(function() {
            // Fade out all flash messages
            $('.flash-message').fadeOut(1000);
        }, 2500); // 2.5 seconds
    });
</script>
@endsection
