<!--

* Simple-Quiz by @elanman
* Copyright 2013 Ben Hall.
* Licensed under http://www.apache.org/licenses/LICENSE-2.0

-->
<?php include'header.php'; ?>
    <div id="container" class="quiz">
      <div class="row">
          <div id="intro" class="col-md-5 col-md-push-5">
          <h2>Quiz :: Web Acronyms</h2>
          <p>Take the test and see how well you know your web acronyms.</p>
          <p>Each question has 4 possible answers.</p>
          <p>Choose an answer and click <strong>'Submit Answer'</strong>. You'll then be given the next question.</p>
          <p>There are <?php echo count($quiz->getQuestions()); ?> questions, so let's get cracking!</p>
          <p>You'll get your score at the end of the test.</p>
          <div id="leaders-score">
              <?php $leadersToShow = 10; ?>
                <h4>Top <?php echo $leadersToShow; ?> Scorers</h4>
                <div class="row">
                    <ul class="leaders col-md-6">
                        <?php
                        $leaders = $quiz->getLeaders($leadersToShow);
                        $numquestions = count($quiz->getQuestions());
                        $counter = 1;
                        foreach ($leaders as $key => $value) :

                            echo '<li><strong>' . $key. '</strong>: ' .  $value . '/' . $numquestions . '</li>';

                            //Use modulus to create new sub-list if required.
                            if ($counter % (round($leadersToShow/2)) == 0) :  
                                echo '</ul>' . PHP_EOL . '<ul class="leaders col-md-6">' . PHP_EOL;
                            endif;

                            $counter++;

                        endforeach;
                        ?>
                    </ul>
                </div>
            </div><!-- leaders-score-->
        </div>
        <div class="col-md-3 col-md-offset-2 col-md-pull-5">
          <h2>Start The Quiz</h2>
          <p>Don't want to appear on the Score Board?</p>
            <form id="jttt" method="post" action="process">
                <p><button type="submit" class="btn btn-primary"><!--<span class="glyphicon glyphicon-chevron-right"></span>--> Just Take The Test</button></p>
            </form>
            <form id="questionBox" method="post" action="process">
                <p>If you want worldwide glory and fame, register a username below.</p> 
                <p>
                    <label for="username">Create A Username:</label><br />
                        <input type="text" id="username" name="username" placeholder="Username" />
                <p><input type="hidden" name="register" value="TRUE" />
                    <input type="submit" id="submit" class="btn btn-primary" value="Register And Take The Test" /></p>
            </form> 
            <p id="helper"><?php if ( $quiz->session->get('error') ) echo $quiz->session->get('error'); ?></p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->
        
    </div><!--container-->
<?php include 'footer.php'; ?>