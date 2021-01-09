@component('mail::message')


<h4>Response From Website</h4>

<div>
   <label for="" style="color: #4c4c4c ; font-weight: 500; ">Name</label>
   <div>{{  $connectdata['name'] }} </div>
</div>
<br>
<div>
   <label for="" style="color: #4c4c4c ; font-weight: 500; ">Email</label>
   <div>{{  $connectdata['email'] }} </div>
</div>
<br>
<div>
   <label for="" style="color: #4c4c4c ; font-weight: 500; " >Subject</label>
   <div>{{  $connectdata['subject'] }} </div>
</div>
<br>
{{-- <div>
   <label for="" style="color: #4c4c4c ; font-weight: 500; ">Contact Time</label>
   <div>{{  $connectdata->created_at->diffForHumans() }} </div>
</div> --}}
<br>
<div>
   <label for="" style="color: #4c4c4c ; font-weight: 500; ">Message</label>
   <div>{{  $connectdata['message'] }} </div>
</div>
<br>

<hr>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
