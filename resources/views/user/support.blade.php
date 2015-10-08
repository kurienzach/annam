@extends('user.base')

@section('content')
        <div class="inner-page-wrap  bg-light">
          <div class="container space-sm">
            <div class="row">
              <div class="col-sm-8">
                <div class="col-md-12 col-md-offset-0 manage-address">
                  <div class="col-md-12">
                    <div class="signup-message">
                      <div class="col-md-12">
                        <h4 class="form-title">Contact Customer Care</h4>
                        <div class="form-body">
                          <form action="#" method="post" id="request-quote-form">
                            <fieldset class="row">
                            <div class="form-group col-md-6 has-icon-right">
                              <input type="name" name="name" id="name" placeholder="Name" class="form-control">
                            </div>
                            <div class="form-group col-md-6 has-icon-right">
                              <input type="email" name="email" id="email" placeholder="Email Id" class="form-control">
                            </div>
                            <div class="form-group col-md-6 has-icon-right">
                                <label for="Issue">Specify your area:</label>
                                <select id="support_form_category" class="form-control" name="">
                                <option value="placing_order_issue">Koramangala</option>
                                <option value="meal_issue">HSR</option>
                                <option value="fulfillment_issue">Jayanagar</option>
                                <option value="order_change">BTM</option>
                                <option value="account_settings">Electronicity</option>
                                </select>
                              </div>
                              <div class="form-group col-md-6 has-icon-right">
                                <label for="Issue">What type of issue do you have?</label>
                                <select id="support_form_category" class="form-control" name="">
                                <option value="placing_order_issue">Placing an order</option>
                                <option value="meal_issue">Problem with a meal</option>
                                <option value="fulfillment_issue">Delivery issue</option>
                                <option value="order_change">Need to change my order</option>
                                <option value="account_settings">Account Settings</option>
                                <option value="password_email_issue">Password or e-mail issue</option>
                                <option value="gift_card">Gift Cards</option>
                                <option value="promotions_referral_issue">Promotions or Referrals</option>
                                <option value="dietary">Dietary and Nutritional</option>
                                <option value="other">Other</option></select>
                              </div>
                              <div class="form-group col-md-12 has-icon-right">
                                <input type="text" name="subject" id="subject" placeholder="Subject (optional)" class="form-control">
                              </div>
                              <div class="form-group col-md-12 has-icon-right">
                                <textarea class="form-control" name="message" placeholder="Your Message" cols="40" rows="4" id="address"></textarea>
                              </div>
                              <div class="form-group col-md-12 has-icon-right">
                            <label for="Screenshot">Attach a file or screenshot (optional)</label>
                              <input id="support_form_file" name="support_form[file]" type="file">
                              </div>
                            </fieldset>
                            <footer>
                              <div class="btn btn-dark btn-fill pull-right" id="">Send Email</div>
                            </footer>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
               <div class="col-sm-4 manage-address">
               <h4 class="form-title">Other Support Options</h4>
               <table class="lined-table" cellpadding="0" cellspacing="0" style="margin: 10px 0 20px 0">          
          <tbody>
          <tr>      
            <td>
                  Phone: +91 973 188 08 41
              <div class="offline">
                Mon-Fri 8AM-10PM<br>
                Sat-Sun 9AM-10PM
              </div>
            </td>        
          </tr>
        </tbody></table>
        <p>You can also check our <a class="clr" href="help.html">Help page</a> to find an immediate answer to our most commonly asked questions.</p>
                </div>
              </div>

            </div>
          </div>
        </div>
@stop
