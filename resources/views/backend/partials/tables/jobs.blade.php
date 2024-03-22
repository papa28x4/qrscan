<table class="table table-striped table-responsive">
    <thead>
      <tr>
        <th> Job ID </th>
        @if(!auth()->user()->hasRole('User'))
        <th> Customer </th>
        @endif
        <th> Job Type </th>
        <th> Status </th>
        <th> Created On </th>
        <th> Actions </th>
      </tr>
    </thead>
    <tbody>
        @foreach($print_jobs as $print_job)
          <tr @if(!$print_job->read_at) class="user-read" @endif>
              <td>{{$print_job->job_code}}</td>
              @if(!auth()->user()->hasRole('User'))
              <td>{{$print_job->user->fullname()}}</td>
              @endif
              <td>{{$print_job->job_type}}</td>
              @if($print_job->quotation)
                @if(auth()->user()->hasRole('User'))
                <td>{{$print_job->status ?? 'submitted'}}</td>
                @else
                <td>{{$print_job->status ?? 'pending'}}</td>
                @endif
              @else
              <td>{{$print_job->status ?? 'draft'}}</td>
              @endif
              <td>{{ date('jS M, Y, g:i a', strtotime($print_job->created_on()))}}</td>
              @if(auth()->user()->hasRole('User'))
                <td class="d-flex align-items-center operations">
                    <a href="{{route('print-jobs.show', $print_job->job_code)}}"><button class="btn btn-primary mr-2">View</button></a>
                    @if($print_job->quotation)
                    <a href="{{route('print-jobs.track', $print_job->job_code)}}"><button class="btn btn-warning mr-2">Track</button></a>
                    @else            
                    <a href="{{route('print-jobs.edit', $print_job->job_code)}}"><button class="btn btn-warning mr-2">Edit</button></a>
                    <span>
                      <a class="btn btn-danger" href="{{ route('print-jobs.destroy', $print_job->job_code) }}"
                        onclick="event.preventDefault();
                                      document.getElementById('destroy-job-{{$print_job->id}}').submit();">
                          {{ __('Delete') }}
                      </a>

                      <form id="destroy-job-{{$print_job->id}}" action="{{ route('print-jobs.destroy', $print_job->job_code) }}" method="POST" class="d-none">
                          @csrf
                          @method('DELETE')
                      </form>
                    </span>
                    @endif
                </td>
              @else
                <td class="d-flex align-items-center operations">
                  <a href="{{route('print-jobs.show', $print_job->job_code)}}"><button class="btn btn-primary mr-2">Details</button></a>
                  @if($print_job->next_action && $print_job->next_action !== 'Accept')
                  <span>
                    <a class="btn btn-danger actions" data-id={{$print_job->job_code}} data-toggle="modal" data-target="#phaseModal" href="#"
                       onclick="event.preventDefault();">
                        {{$print_job->next_action}}
                    </a>
                    @csrf
                  </span>
                  @endif         
                </td>     
              @endif
          </tr>
       @endforeach
    </tbody>
</table>



<div style="margin-right:60px;" class="row pt-4 pl-4 align-items-start justify-content-between">
<span class="result text-muted mt-2">{{ $print_jobs->firstItem() }} - {{ $print_jobs->lastItem() }} of {{ $print_jobs->total() }} results</span>
{{ $print_jobs->links() }}
</div>