<form action="{{route('front.submit.contact')}}" class="contact-form" id="cotact-form" method="POST">
   @csrf
   @if (session()->has('success'))
  <div class="success-container">
       <div class="icon"> <i class="fas fa-check-circle"></i></div>
      <div class="success-message">
         {!! session()->get('success')!!}
       
       </div>
   </div>  
  @endif 
   <div class="contact-i-grp __with-icon">
       <div class="icon"><i class="fas fa-signature"></i></div>
       <div class="input-box">
          <label for="">Name</label>
          <input type="text" class="input-control" placeholder="full name" v-model="name" name="name" value="{{old('name')}}">
          @error('name') <span class="error-message">{{ $message }}</span>   @enderror    
       </div>
     
   </div>
   <div class="contact-i-grp __with-icon">
       <div class="icon"><i class="fas fa-at"></i></div>
       <div class="input-box">
          <label for="">Email</label>
          <input type="text" class="input-control" placeholder="email address" v-model="email" name="email" value="{{ old('email')}}">
          @error('email') <span class="error-message">{{ $message }}</span>   @enderror
       </div>
      
   </div>
   <div class="contact-i-grp __with-icon">
       <div class="icon"><i class="fas fa-envelope"></i></div>
       <div class="input-box">
          <label for="">Subject</label>
          <input type="text" class="input-control" placeholder="full subject" name="subject" value="{{ old('subject') }}">
          @error('subject') <span class="error-message">{{ $message }}</span>   @enderror
       </div>
       
   </div>
   <div class="contact-i-grp __with-icon">
       <div class="icon"><i class="fas fa-feather-alt"></i></div>
       <div class="input-box">
          <label for="">Message</label>
          <textarea  id="" cols="30" rows="10" placeholder="message ..." class="input-control text-area" name="message">{{ old('message') }}</textarea>
          @error('message') <span class="error-message">{{ $message }}</span>   @enderror
       </div>
      
   </div>

   <button type="submit" class="project-btn __c-p">Submit</button>

</form>