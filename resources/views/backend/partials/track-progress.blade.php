<div class="box">
    <div class="sub-box">
        <div class="phase-title">
            <h4 class="text-center mb-2">Tracking {{$print_job->job_code}}</h4>
            <p class="text-white text-center py-2 mb-4">
                {{$print_job->current_phase === 'Accepted' ? 'COMPLETED' : strtoupper($print_job->current_phase)}}
            </p>
        </div>
        <div class="phase-area">
            <ul>
                @if($print_job->quotation)
                <li class="phase">
                    <i class="mdi mdi-check-circle"></i>
                    <div>
                        <label class="badge badge-gradient-success mr-2">Submitted</label>
                        <label class="date">{{$print_job->quotation->formatDate()}}</label>
                    </div>
                    <p class="details">
                        Your job has been received
                    </p>
                </li>
                @endif
                @if(count($print_job->phases->where('phase', 'In Progress')))
                <li class="phase">
                    <i class="mdi mdi-check-circle"></i>
                    <div>
                        <label class="badge badge-gradient-success mr-2">{{$print_job->phases->where('phase', 'In Progress')->first()->phase}}</label>
                        <span class="date">
                            {{ $print_job->formatDate('In Progress')}}
                        </span>
                        
                    </div>
                    <p class="details">
                        {{$print_job->phases->where('phase', 'In Progress')->first()->details}}
                    </p>
                </li>
                @endif
                @if(count($print_job->phases->whereIn('phase', ['Scanned', 'Copied', 'Printed'])))
                <li class="phase">
                    <i class="mdi mdi-check-circle"></i>
                    <div>
                        <label class="badge badge-gradient-success mr-2">{{$print_job->phases->whereIn('phase', ['Scanned', 'Copied', 'Printed'])->first()->phase}}</label>
                        <span class="date">{{ $print_job->formatDateTime(['Scanned', 'Copied', 'Printed'])}}</span>
                    </div>
                    <p class="details">
                        {{$print_job->phases->whereIn('phase', ['Scanned', 'Copied', 'Printed'])->first()->details}}
                    </p>
                </li>
                @endif
                @if(count($print_job->phases->where('phase', 'Delivered')))
                <li class="phase">
                    <i class="mdi mdi-check-circle"></i>
                    <div>
                        <label class="badge badge-gradient-success mr-2">{{$print_job->phases->where('phase', 'Delivered')->first()->phase}}</label>
                        <span class="date">
                            {{ $print_job->formatDate('Delivered')}}
                        </span>
                        
                    </div>
                    <p class="details">
                        {{$print_job->phases->where('phase', 'Delivered')->first()->details}}
                    </p>
                </li>
                @endif
                @if($print_job->current_phase === 'Accepted')
                <li class="phase">
                    <i class="mdi mdi-check-circle"></i>
                    <div>
                        <label class="badge badge-gradient-success mr-2">{{$print_job->phases->where('phase', 'Accepted')->first()->phase}}</label>
                        <span class="date">
                            {{ $print_job->formatDate('Accepted')}}
                        </span>
                        
                    </div>
                    <p class="details">
                        Thank you for doing business with us
                    </p>
                </li>
                @endif
                @if($print_job->next_action && $print_job->next_action !== 'Done')
                <li class="phase">
                    <i class="mdi mdi-checkbox-blank-circle-outline"></i>
                    <div>
                        <label class="badge badge-secondary mr-2">{{$print_job->next_description}}</label>
                        <span class="date"></span>
                    </div>
                </li>
                @endif
            </ul>
        </div>
        @if(auth()->user()->hasRole('User') && $print_job->next_description === 'Awaiting Customer Acceptance')
        <div class="d-flex justify-content-center pt-4 pb-3">
            <span>
                <button value="Accept" class="btn btn-success actions" data-id={{$print_job->job_code}} data-toggle="modal" data-target="#feedbackModal1" href="#">
                    {{$print_job->next_action}}
                </button>
                @csrf
            </span>
        </div>
        @endif
    </div>
</div>