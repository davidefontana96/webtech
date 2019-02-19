<form class="form">
  {{ csrf_field() }}
    <div class="form-group">

        <div class="col-xs-6">
            <label for="first_name"><h4>First name</h4></label>
            <input value="{{ Auth::user()->name }}"type="text" class="form-control" name="first_name" id="first_name" placeholder="first name" title="enter your first name if any.">
        </div>
    </div>
    <div class="form-group">

        <div class="col-xs-6">
          <label for="last_name"><h4>Last name</h4></label>
            <input type="text" value="{{ Auth::user()->surname }}" class="form-control" name="last_name" id="last_name" placeholder="last name" title="enter your last name if any.">
        </div>
    </div>

    <div class="form-group">

        <div class="col-xs-6">
            <label for="phone"><h4>Telephone</h4></label>
            <input type="text" class="form-control" value="{{Auth::user()->telephone}}" name="phone" id="phone" placeholder="enter phone" title="enter your phone number if any.">
        </div>
    </div>

    <div class="form-group">
        <div class="col-xs-6">
           <label for="mobile"><h4>Mobile</h4></label>
            <input type="text" class="form-control" value="{{Auth::user()->mobile }}" name="mobile" id="mobile" placeholder="enter mobile number" title="enter your mobile number if any.">
        </div>
    </div>
    <div class="form-group">

        <div class="col-xs-6">
            <label for="email"><h4>Email</h4></label>
            <input type="email" value="	{{ Auth::user()->email }}" class="form-control" name="email" id="email" placeholder="your@email.com" title="enter your email.">
        </div>
    </div>
    <div class="form-group">

        <div class="col-xs-6">
            <label for="address"><h4>Address</h4></label>
            <input value="{{ Auth::user()->address }}"type="text" class="form-control" name="address" id="address" placeholder="first name" title="enter your address.">
        </div>
    </div>
    <div class="form-group">

        <div class="col-xs-6">
            <label for="password"><h4>Password</h4></label>
            <input type="password" value="" class="form-control" name="password" id="password" placeholder="password" title="enter your password.">
        </div>
    </div>
    <div class="form-group">

        <div class="col-xs-6">
          <label for="password2"><h4>Verify</h4></label>
            <input type="password" class="form-control" name="password2" id="password2" placeholder="password2" title="enter your password2.">
        </div>
    </div>
    <div class="form-group">
         <div class="col-xs-6">
              </br>

              <div class="form-group">

              <button{{-- type="submit"--}} value="modify" id="buttoncab" class="btn btn-primary">modify</button>

                </div>
          </div>
    </div>
    <div class="col-xs-6">
         </br>

         <div class="form-group">

             <h6 align="right">(to change the password, rewrite the old one)</h6>

           </div>
     </div>
</form>

@include('sweetalert::alert')
