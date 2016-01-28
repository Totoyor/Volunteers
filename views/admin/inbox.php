<?php include_once('layout/adminheader.inc.php'); ?>
<!-- Main Content -->
  <section class="content-wrap mail-inbox">


    <!-- Breadcrumb -->
    <div class="page-title">

      <div class="row">
        <div class="col s12 m9 l10">
          <h1>Inbox <small class='grey-text'>(2 new)</small></h1>

          <ul>
            <li>
              <a href="#"><i class="fa fa-home"></i> Home</a>  <i class="fa fa-angle-right"></i>
            </li>

            <li><a href='#!'>Mail</a><i class='fa fa-angle-right'></i>
            </li>
            <li><a href='mail-inbox.html'>Inbox</a>
            </li>
          </ul>
        </div>
        <div class="col s12 m3 l2 right-align">
          <a href="#!" class="btn grey lighten-3 grey-text z-depth-0 chat-toggle"><i class="fa fa-comments"></i></a>
        </div>
      </div>

    </div>
    <!-- /Breadcrumb -->

    <div class="card-panel">
      <form action="#!">
        <div class="input-field mail-search">
          <i class="mdi-action-search prefix"></i>
          <input id="mail_search" type="text" name="mail_search">
          <label for="mail_search">Search</label>
          <!--a class="btn">Search</a-->
        </div>
      </form>
    </div>

    <div class="row">
      <div class="col s12 m3 l2">
        <div class="card-panel">

          <!-- Mail Sidebar -->
          <ul class="mail-sidebar">
            <li class="active">
              <a href="mail-inbox.html"><i class="mdi-content-inbox"></i> Inbox</a>
            </li>
            <li>
              <a href="mail-inbox.html"><i class="mdi-device-access-time"></i> Snoozed</a>
            </li>
            <li>
              <a href="mail-inbox.html"><i class="mdi-action-done"></i> Done</a>
            </li>


            <li>
              <hr>
            </li>

            <li>
              <a href="mail-inbox.html"><i class="mdi-content-send"></i> Sent</a>
            </li>
            <li>
              <a href="mail-inbox.html"><i class="mdi-action-delete"></i> Trash</a>
            </li>
            <li>
              <a href="mail-inbox.html"><i class="mdi-content-report"></i> Spam</a>
            </li>


            <li>
              <hr>
            </li>

            <li>
              <a href="mail-inbox.html"><i class="mdi-device-airplanemode-on"></i> Travel</a>
            </li>
            <li>
              <a href="mail-inbox.html"><i class="mdi-action-shopping-cart"></i> Purchases</a>
            </li>
            <li>
              <a href="mail-inbox.html"><i class="mdi-social-group"></i> Social</a>
            </li>
            <li>
              <a href="mail-inbox.html"><i class="mdi-file-cloud-download"></i> Updates</a>
            </li>
            <li>
              <a href="mail-inbox.html"><i class="mdi-communication-forum"></i> Forums</a>
            </li>
          </ul>
          <!-- /Mail Sidebar -->

        </div>
      </div>
      <div class="col s12 m9 l10">
        <div class="card-panel">
          <div class="table-responsive">
            <table class="table table-bordered">
              <tbody>
                <tr class="read">
                  <th class="mail-check">
                    <input type="checkbox" id="checkbox1" />
                    <label for="checkbox1"></label>
                  </th>
                  <td class="mail-contact">
                    <a href="mail-view.html">Isobel Murphy</a>
                  </td>
                  <td class="mail-subject">
                    <a href="mail-view.html">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a>
                  </td>
                  <td class="mail-date">3:12 PM</td>
                </tr>

                <tr class="unread">
                  <th class="mail-check">
                    <input type="checkbox" id="checkbox2" />
                    <label for="checkbox2"></label>
                  </th>
                  <td class="mail-contact">
                    <a href="mail-view.html">Dianne Chambers</a>
                  </td>
                  <td class="mail-subject">
                    <a href="mail-view.html">Ut feugiat tempus felis, sit amet mattis dolor accumsan quis. Aenean pharetra tempus justo, vitae euismod ipsum congue a.</a>
                  </td>
                  <td class="mail-date">9:02 AM</td>
                </tr>

                <tr class="unread">
                  <th class="mail-check">
                    <input type="checkbox" id="checkbox3" />
                    <label for="checkbox3"></label>
                  </th>
                  <td class="mail-contact">
                    <a href="mail-view.html">Joanne Stephens</a>
                  </td>
                  <td class="mail-subject">
                    <a href="mail-view.html">Proin suscipit lobortis porta. Interdum et malesuada fames ac ante ipsum primis in faucibus.</a>
                  </td>
                  <td class="mail-date">Dec 19</td>
                </tr>

                <tr class="read">
                  <th class="mail-check">
                    <input type="checkbox" id="checkbox4" checked />
                    <label for="checkbox4"></label>
                  </th>
                  <td class="mail-contact">
                    <a href="mail-view.html">Ethan Baker</a>
                  </td>
                  <td class="mail-subject">
                    <a href="mail-view.html">Pellentesque vitae vulputate dolor, vitae aliquet elit. Sed est felis, pretium ac lacus vitae, vestibulum lacinia ante.</a>
                  </td>
                  <td class="mail-date">Feb 3</td>
                </tr>

                <tr class="read">
                  <th class="mail-check">
                    <input type="checkbox" id="checkbox5" checked />
                    <label for="checkbox5"></label>
                  </th>
                  <td class="mail-contact">
                    <a href="mail-view.html">Gilbert Hughes</a>
                  </td>
                  <td class="mail-subject">
                    <a href="mail-view.html">Vivamus scelerisque egestas nisi nec posuere.</a>
                  </td>
                  <td class="mail-date">January 27</td>
                </tr>

                <tr class="read">
                  <th class="mail-check">
                    <input type="checkbox" id="checkbox6" />
                    <label for="checkbox6"></label>
                  </th>
                  <td class="mail-contact">
                    <a href="mail-view.html">Liam Hudson</a>
                  </td>
                  <td class="mail-subject">
                    <a href="mail-view.html">Donec quis semper ligula. Etiam vel ex mollis tellus posuere fringilla et id augue.</a>
                  </td>
                  <td class="mail-date">5:42 PM</td>
                </tr>

                <tr class="read">
                  <th class="mail-check">
                    <input type="checkbox" id="checkbox7" />
                    <label for="checkbox7"></label>
                  </th>
                  <td class="mail-contact">
                    <a href="mail-view.html">Harold Mendoza</a>
                  </td>
                  <td class="mail-subject">
                    <a href="mail-view.html">Donec mauris lorem, rhoncus sed mattis et, vestibulum vitae tellus.</a>
                  </td>
                  <td class="mail-date">Mar 17</td>
                </tr>

                <tr class="read">
                  <th class="mail-check">
                    <input type="checkbox" id="checkbox8" />
                    <label for="checkbox8"></label>
                  </th>
                  <td class="mail-contact">
                    <a href="mail-view.html">Alfred Graham</a>
                  </td>
                  <td class="mail-subject">
                    <a href="mail-view.html">Integer congue congue viverra. Maecenas fringilla ac orci at interdum.</a>
                  </td>
                  <td class="mail-date">Apr 9</td>
                </tr>

                <tr class="read">
                  <th class="mail-check">
                    <input type="checkbox" id="checkbox9" />
                    <label for="checkbox9"></label>
                  </th>
                  <td class="mail-contact">
                    <a href="mail-view.html">Judy Graves</a>
                  </td>
                  <td class="mail-subject">
                    <a href="mail-view.html">Quisque laoreet dolor vel metus imperdiet, ut venenatis odio congue.</a>
                  </td>
                  <td class="mail-date">1:48 AM</td>
                </tr>

                <tr class="read">
                  <th class="mail-check">
                    <input type="checkbox" id="checkbox10" />
                    <label for="checkbox10"></label>
                  </th>
                  <td class="mail-contact">
                    <a href="mail-view.html">Joanne Stephens</a>
                  </td>
                  <td class="mail-subject">
                    <a href="mail-view.html">Nullam at venenatis turpis. Sed hendrerit pellentesque neque, id vestibulum sem eleifend eget.</a>
                  </td>
                  <td class="mail-date">Jun 28</td>
                </tr>

                <tr class="read">
                  <th class="mail-check">
                    <input type="checkbox" id="checkbox11" />
                    <label for="checkbox11"></label>
                  </th>
                  <td class="mail-contact">
                    <a href="mail-view.html">Ethan Baker</a>
                  </td>
                  <td class="mail-subject">
                    <a href="mail-view.html">Nullam finibus malesuada nulla nec viverra. Maecenas eget ipsum at odio venenatis consequat.</a>
                  </td>
                  <td class="mail-date">Jul 1</td>
                </tr>

                <tr class="read">
                  <th class="mail-check">
                    <input type="checkbox" id="checkbox12" />
                    <label for="checkbox12"></label>
                  </th>
                  <td class="mail-contact">
                    <a href="mail-view.html">Gilbert Hughes</a>
                  </td>
                  <td class="mail-subject">
                    <a href="mail-view.html">Maecenas ullamcorper elit vitae odio laoreet vehicula.</a>
                  </td>
                  <td class="mail-date">Sep 8</td>
                </tr>

                <tr class="read">
                  <th class="mail-check">
                    <input type="checkbox" id="checkbox13" />
                    <label for="checkbox13"></label>
                  </th>
                  <td class="mail-contact">
                    <a href="mail-view.html">Liam Hudson</a>
                  </td>
                  <td class="mail-subject">
                    <a href="mail-view.html">Donec tempor elementum augue, ut condimentum dolor porta vitae.</a>
                  </td>
                  <td class="mail-date">9:00 PM</td>
                </tr>

                <tr class="read">
                  <th class="mail-check">
                    <input type="checkbox" id="checkbox14" />
                    <label for="checkbox14"></label>
                  </th>
                  <td class="mail-contact">
                    <a href="mail-view.html">Harold Mendoza</a>
                  </td>
                  <td class="mail-subject">
                    <a href="mail-view.html">Proin efficitur elementum risus fermentum mattis.</a>
                  </td>
                  <td class="mail-date">3:12 PM</td>
                </tr>

                <tr class="read">
                  <th class="mail-check">
                    <input type="checkbox" id="checkbox15" />
                    <label for="checkbox15"></label>
                  </th>
                  <td class="mail-contact">
                    <a href="mail-view.html">Alfred Graham</a>
                  </td>
                  <td class="mail-subject">
                    <a href="mail-view.html">Cras at nibh euismod, rutrum risus id, semper ex. Sed condimentum felis at porta rutrum.</a>
                  </td>
                  <td class="mail-date">8:22 AM</td>
                </tr>

                <tr class="read">
                  <th class="mail-check">
                    <input type="checkbox" id="checkbox16" />
                    <label for="checkbox16"></label>
                  </th>
                  <td class="mail-contact">
                    <a href="mail-view.html">Judy Graves</a>
                  </td>
                  <td class="mail-subject">
                    <a href="mail-view.html">Aenean vestibulum sem vitae elit varius placerat.</a>
                  </td>
                  <td class="mail-date">May 15</td>
                </tr>

                <tr class="read">
                  <th class="mail-check">
                    <input type="checkbox" id="checkbox17" />
                    <label for="checkbox17"></label>
                  </th>
                  <td class="mail-contact">
                    <a href="mail-view.html">Joanne Stephens</a>
                  </td>
                  <td class="mail-subject">
                    <a href="mail-view.html">In aliquet sodales mauris, eu tempus leo dictum a.</a>
                  </td>
                  <td class="mail-date">Oct 12</td>
                </tr>

                <tr class="read">
                  <th class="mail-check">
                    <input type="checkbox" id="checkbox18" />
                    <label for="checkbox18"></label>
                  </th>
                  <td class="mail-contact">
                    <a href="mail-view.html">Ethan Baker</a>
                  </td>
                  <td class="mail-subject">
                    <a href="mail-view.html">Proin vel vulputate tortor. Integer vulputate augue a sapien semper molestie.</a>
                  </td>
                  <td class="mail-date">November 30</td>
                </tr>

                <tr class="read">
                  <th class="mail-check">
                    <input type="checkbox" id="checkbox19" />
                    <label for="checkbox19"></label>
                  </th>
                  <td class="mail-contact">
                    <a href="mail-view.html">Gilbert Hughes</a>
                  </td>
                  <td class="mail-subject">
                    <a href="mail-view.html">Mauris in purus sit amet mauris tincidunt rutrum.</a>
                  </td>
                  <td class="mail-date">1:22 PM</td>
                </tr>

                <tr class="read">
                  <th class="mail-check">
                    <input type="checkbox" id="checkbox20" />
                    <label for="checkbox20"></label>
                  </th>
                  <td class="mail-contact">
                    <a href="mail-view.html">Liam Hudson</a>
                  </td>
                  <td class="mail-subject">
                    <a href="mail-view.html">Etiam vel orci nibh. Aliquam tempus, metus id eleifend tempor, sapien eros hendrerit tellus, vitae venenatis velit tortor sit amet mauris.</a>
                  </td>
                  <td class="mail-date">2:42 AM</td>
                </tr>

                <tr class="read">
                  <th class="mail-check">
                    <input type="checkbox" id="checkbox21" />
                    <label for="checkbox21"></label>
                  </th>
                  <td class="mail-contact">
                    <a href="mail-view.html">Harold Mendoza</a>
                  </td>
                  <td class="mail-subject">
                    <a href="mail-view.html">Aliquam eget dui dui. Vestibulum sollicitudin dui a neque tempus, non tincidunt nibh tempor.</a>
                  </td>
                  <td class="mail-date">Jan 2</td>
                </tr>

                <tr class="read">
                  <th class="mail-check">
                    <input type="checkbox" id="checkbox22" />
                    <label for="checkbox22"></label>
                  </th>
                  <td class="mail-contact">
                    <a href="mail-view.html">Alfred Graham</a>
                  </td>
                  <td class="mail-subject">
                    <a href="mail-view.html">Morbi tempus orci ante, eget ultrices turpis tristique eget.</a>
                  </td>
                  <td class="mail-date">Nov 16</td>
                </tr>

                <tr class="read">
                  <th class="mail-check">
                    <input type="checkbox" id="checkbox23" />
                    <label for="checkbox23"></label>
                  </th>
                  <td class="mail-contact">
                    <a href="mail-view.html">Judy Graves</a>
                  </td>
                  <td class="mail-subject">
                    <a href="mail-view.html">Etiam molestie sit amet lectus non placerat.</a>
                  </td>
                  <td class="mail-date">0:00 PM</td>
                </tr>

              </tbody>
            </table>
          </div>

          <div class="center-align">
            <a href="#!" class="btn-flat waves-effect grey-text text-darken-1">Load More</a>
          </div>
        </div>
      </div>
    </div>

  </section>
  <!-- /Main Content -->
<?php include_once('layout/adminfooter.inc.php'); ?>