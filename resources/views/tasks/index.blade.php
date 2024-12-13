@extends('layouts.admin')

@section('content')

<!-- BEGIN: Content -->
<div class="content">
    <h2 class="intro-y text-lg font-medium mt-10">
        Tasks List
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-8 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="{{ route('tasks.create') }}" class="btn btn-primary shadow-md mr-2">Add New Task</a>
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
                        <th class="whitespace-nowrap">TASK NAME</th>
                        <th class="text-center whitespace-nowrap">TASK DESCRIPTION</th>
                        <th class="text-center whitespace-nowrap">ACTIVITY</th>
                        <th class="text-center whitespace-nowrap">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tasks as $task )

                    <tr class="intro-x">
                        <td>
                            <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">{{$task->name}}</div>
                        </td>
                        <td class="w-40">
                            <div class="text-slate-500 text-xs ml-10 whitespace-nowrap mt-0.5">{{ $task->description ?? '' }}</div>
                        </td>
                        <td class="w-40">
                            <div class="text-slate-500 text-xs ml-10 whitespace-nowrap mt-0.5">{{ $task->activity->name ?? '' }}</div>
                        </td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center mr-3" href="{{ route('tasks.edit', $task->id) }}"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
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
                        <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                        {{-- <button type="button" class="btn btn-danger w-24">Delete</button> --}}
                        <form action="{{ isset($task->id) ? route('tasks.destroy', $task->id) : '#' }}" method="POST">
                            @auth
                                @csrf
                                @method('DELETE')
                                <button type='submit' class="btn btn-danger w-24">
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


@endsection
