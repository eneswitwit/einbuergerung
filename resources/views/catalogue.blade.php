<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Einbürgerungstest 2017</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">

        <!-- Bootstrap -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <!-- Styles -->
        <style>

            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Slabo 27px', serif;
                font-size: x-large;
                margin: 0;
            }

            footer {
                margin-top:50px;
            }


            .links > a {
                color: #636b6f;
                padding: 0 25px;
                text-decoration: none;
                text-align: center;
            }


            .question_block {
                border: 1px solid black;
                margin: 15px;
                font-family: 'Slabo 27px', serif;
                font-size: x-large;
                padding:20px;
            }

            p {
                margin-bottom: 20px;
            }

            .success {
                background-color: #5cb85c;
                padding:3px;
                color:white;
            }

        </style>
    </head>
    <body>
        <div class="container">
                <h1 style="margin-top:60px;margin-bottom:30px;text-align: center;">
                    Einbürgerungstest
                </h1>

                <div class="links" style="text-align: center;margin-bottom: 30px;">
                        <a href="/einbuergerungstest">Einbürgerungstest starten</a>
                        <a href="/fragenkatalog" }}>Fragenkatalog</a>
                        <a href="/informationen">Informationen</a>
                </div>
                <hr style="height:5px;border:none;color:#333;background-color:#333; margin-bottom: 60px;" />
                <h2 style="text-align: center;"> Fragenkatalog </h2>
                @foreach ($questions as $question)
                <div class="question_block">
                    <div class="row" style="margin-bottom:20px;"">
                        <div class="col-md-4">
                            <b> Frage </b> 
                        </div>
                        <div class="col-md-8">
                            {{  $question->question }}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <b> Antworten </b>
                        </div>
                        <div class="col-md-8">
                            <p  @if($question->answer_1 == $question->correctAnswer) id={{ "correct_answer" . $question->id }} @endif>1. {{  $question->answer_1 }} </p> 
                             <p  @if($question->answer_2 == $question->correctAnswer) id={{ "correct_answer" . $question->id }} @endif>2. {{  $question->answer_2 }} </p> 
                             <p @if($question->answer_3 == $question->correctAnswer) id={{ "correct_answer" . $question->id }} @endif>3. {{  $question->answer_3 }} </p> 
                             <p @if($question->answer_4 == $question->correctAnswer) id={{ "correct_answer" . $question->id }} @endif>4. {{  $question->answer_4 }}</p> 
                            <button class="btn btn-success btn-lg" style="font-family: 'Slabo 27px', serif;font-size: x-large;" id="{{ 'show_correct_answer' . $question->id }}" data-dismiss="alert"> Richtige Antwort anzeigen</button>

                            <script>

                                document.getElementById("{{'show_correct_answer'. $question->id}}").onclick = function()
                                {
                                    var correct_answer = document.getElementById("{{'correct_answer'. $question->id }}");
                                    if(correct_answer.className == "success")
                                    {
                                        //
                                    }
                                    else
                                    {
                                        correct_answer.className += "success";
                                    }
                                    
                                }


                            </script>
                        </div>
                    </div>

                </div>
                @endforeach
            </div>
        </div>
    </body>

    <footer class="footer" style="text-align:center" >
        <a href="/impressum">Impressum</a>
    </footer>
</html>