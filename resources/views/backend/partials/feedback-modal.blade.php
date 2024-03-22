 <!-- Modal -->
 <div class="modal fade" id="feedbackModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body p-0">
            <div class="card shadow ratings">
                <div class="d-flex flex-row justify-content-between p-3 adiv text-white"> 
                    <i class="fas fa-chevron-left"></i> 
                    <h5 class="pb-3">Thank You</h5> 
                    <button style="margin-top: -1px;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="text-white" aria-hidden="true">&times;</span>
                      </button>
                </div>
                <div class="mt-3 p-4 text-center review">
                    <h6 class="mb-0">Your feedback help us to improve.</h6> <small class="px-3">Please let us know about your experience.</small>
                    <div class="d-flex flex-row justify-content-center mt-3"> 
                        <img class="smileys" title="angry" src="{{asset('backend/images/smileys/angry-face-emoji--v2.png')}}" /> 
                        <img class="smileys" title="sad" src="{{asset('backend/images/smileys/sad.png')}}" /> 
                        <img class="smileys" title="satisfied" src="{{asset('backend/images/smileys/happy.png')}}" /> 
                        <img class="smileys" title="pleased" src="{{asset('backend/images/smileys/smiling-face.png')}}" /> 
                        <img class="smileys" title="very pleased" src="{{asset('backend/images/smileys/lol.png')}}" /> 
                        
                        {{-- <img title="angry" src="https://img.icons8.com/emoji/48/000000/angry-face-emoji--v2.png" /> 
                        <img title="sad" src="https://img.icons8.com/fluent/48/000000/sad.png" /> 
                        <img  title="satisfied" src="https://img.icons8.com/color/48/000000/happy.png" /> 
                        <img title="pleased" src="https://img.icons8.com/emoji/48/000000/smiling-face.png" /> 
                        <img title="very pleased" src="https://img.icons8.com/color/48/000000/lol.png" />  --}}
                    </div>
                    <div class="form-group mt-4"> <textarea class="form-control" rows="5" id="comment" name="comment" placeholder="Message"></textarea> </div>
                    <div class="mt-2"> <button type="button" id="feedback" data-dismiss="modal" class="btn btn-primary btn-block feedback"><span class="text-white">Send feedback</span></button> </div>
                    {{-- <p class="mt-3">Continue without sending feedback</p> --}}
                    <button  type="button" id="no-feedback" data-dismiss="modal" class="btn feedback">Continue without sending feedback</button>
                    {{-- <a href="{{route('print-jobs.track', $print_job->job_code)}}">Continue without sending feedback</a> --}}
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>