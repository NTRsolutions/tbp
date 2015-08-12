<head>
	<?php //echo $this->Html->css(''); ?>
	<?php //echo $this->Html->script('jquery-2.1.4.min'); ?>
</head>
<div style="width: 50%;margin: 10% auto;">
<table class="table table-hover">
        <thead>
          <tr>
              <th data-field="id">Name</th>
              <th data-field="name">Item Name</th>
              <th data-field="price">Item Price</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>Alvin</td>
            <td>Eclair</td>
            <td>$0.87</td>
          </tr>
          <tr>
            <td>Alan</td>
            <td>Jellybean</td>
            <td>$3.76</td>
          </tr>
          <tr>
            <td>Jonathan</td>
            <td>Lollipop</td>
            <td>$7.00</td>
          </tr>
        </tbody>
      </table>
<nav>
  <ul class="right hide-on-med-and-down">
    <li><a href="#!">First Sidebar Link</a></li>
    <li><a href="#!">Second Sidebar Link</a></li>
  </ul>
  <ul id="slide-out" class="side-nav">
    <li><a href="#!">First Sidebar Link</a></li>
    <li><a href="#!">Second Sidebar Link</a></li>
  </ul>
  <a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
</nav>
</div>
<form class="form-horizontal">
    <fieldset>
        <legend>Legend</legend>
        <div class="form-group">
            <label for="inputEmail" class="col-lg-2 control-label">Email</label>
            <div class="col-lg-10">
                <input type="email" class="form-control" id="inputEmail" placeholder="Email">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword" class="col-lg-2 control-label">Password</label>
            <div class="col-lg-10">
                <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                <div class="checkbox">
                    <label>
                        <input type="checkbox"> Checkbox
                    </label>
                </div>
                <br>
                <div class="togglebutton">
                    <label>
                        <input type="checkbox" checked=""> Toggle button
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="inputFile" class="col-lg-2 control-label">File</label>
            <div class="col-lg-10">
                <input type="text" readonly="" class="form-control floating-label" placeholder="Browse...">
                <input type="file" id="inputFile" multiple="">
            </div>
        </div>
        <div class="form-group">
            <label for="textArea" class="col-lg-2 control-label">Textarea</label>
            <div class="col-lg-10">
                <textarea class="form-control" rows="3" id="textArea"></textarea>
                <span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">Radios</label>
            <div class="col-lg-10">
                <div class="radio radio-primary">
                    <label>
                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                        Option one is this
                    </label>
                </div>
                <div class="radio radio-primary">
                    <label>
                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                        Option two can be something else
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="select" class="col-lg-2 control-label">Selects</label>
            <div class="col-lg-10">
                <select class="form-control" id="select">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
                <br>
                <select multiple="" class="form-control">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                <button class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </fieldset>
</form>
<script>
	// Initialize collapse button
  // $(".button-collapse").sideNav();
  // Initialize collapsible (uncomment the line below if you use the dropdown variation)
  $('.collapsible').collapsible();
        
</script>
