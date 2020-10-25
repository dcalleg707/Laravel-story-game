<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class game_master extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\ResponseF
     */
    public function __invoke(Request $request, $section = "", $item ="", $death = "")
    {

        $sections = [
          'bad_castle'=>
          [
          'description' =>'you made it!, you destroyed the second pillar and left the forest. Now, in your way to the third pillar you hear an explosion far away and the castle of the demon lord magically appears in front of you. A bird tells you that an explosive trap that was being set for you exploded by accident and destroyed the last pillar, so you can now go to the castle and save the world.',
          'answers' => [
          ['died/%20/warcry','Go straight to the castle screaming your war cry'],
          ['cristo','make a little pray and go into the castle protected by God'],
          ],
          'image' =>'img/bad_castle.jpg'
          ],
          'bakamitai'=>
          [
          'description' =>'The skeleton had such a beautiful voice that you decided to stay with him for the rest of your life (this was not too long since you left your labour of defeating the demon lord)',
          'answers' => [
          ['died/%20/karaoke','oh yes'],
          ],
          'image' =>'img/image.png',
          'music' => 'music/bakamitai.mp3',
          'video' =>'img/sans.mp4'
          ],
          'beginning'=>
          [
          'description' =>'Brave hero, Before you lays a big and magnificent castle, a powerful force whispers from deep within your soul that you must go inside and therefore fulfill your magnificent destiny',
          'answers' => [
          ['castle','"Go inside the castle and discover your destiny"'],
          ['fishing','"Go back home to live as a fisherman"'],
          ],
          'image' => 'img/mauro-abde-castillo.png'
          ],
          'castle'=>
          [
          'description' =>'Marcelo the mighty, king of this land, greets you with great pleasure: "Oh brave hero, you who have arrived from a distant and mysterious land, you are the one that will save this kingdom. We beg you, destroy the three magic pillars that are hidden within this land and protect the castle of Padalustro, and slay the demon lord who resides in it." he´s small so you bend on your knees to meet him and answer: ',
          'answers' => [
          ['first_town','"I will help!"'],
          ['fishing','"No thanks, i´ll better go fishing for a while"'],
          ],
          'image' =>'img/marselo_xd.jpg'
          ],
          'cristo'=>
          [
          'description' =>'God has protected you, without his blessing you would have died instantaneously',
          'answers' => [
          ['math','Viva Cristo Rey'],
          ],
          'image' =>'img/cristo.png'
          ],
          'demon'=>
          [
          'description' =>'the demon lord, Sermalo, was expecting you, and he has prepared the most brutal scenery for your death: an UNO game, you doubt about your skills since you are the worst UNO player in your world, but you choose to fight, there is no way back',
          'answers' => [
          ['uno','Oh no'],
          ],
          'image' =>'img/sermalouno.jpg',
          'requires' => ['item' => 'debt', 'death' => 'loan', 'action' => 2]
          ],
          'died'=>
          [
          'description' =>'',
          'answers' => [
          ['beginning','Retry'],
          ],
          'image' =>'img/died.jpg',
          'music' => 'music/death.mp3'
          ],
          'disrespect'=>
          [
          'description' =>'"¡¡¡SAY SIKE RIGHT NOW YOU LITTLE PRICK!!!", oh no, the demon lord is back!. "YOUR DISRESPECT MADE ME COME BACK FROM THE GRAVE, NOW YOU WILL SEE!!! MY FINAL FORM !!! "',
          'answers' => [
          ['died/%20/final','Sike'],
          ],
          'image' =>'img/final_form.png'
          ],
          'door'=>
          [
          'description' =>'You made it!, the demon lord is right in front of you, after this doors, and you´re ready to go and save the world once and for all, are you sure you want to continue?',
          'answers' => [
          ['demon','yes'],
          ['door','no'],
          ],
          'image' =>'img/door.png'
          ],
          'end'=>
          [
          'description' =>'It was a great adventure, and you are ready to take your price, you have the honour to marry the daughter of the king and become the governor of this land for ever. ',
          'answers' => [
          ['index','"I will always protect this land"'],
          ['fishing','"thanks, but I´d rather go fishing now"'],
          ],
          'image' =>'img/coronacion.png'
          ],
          'first_pillar'=>
          [
          'description' =>'you´ve found the pillar; it´s a giant, red and shiny rock in the middle of the biggest dance club in the cave. when you try to destroy it a lord skeleton gets in your way and tells you he wont let you do it',
          'answers' => [
          ['sword','kill the lord skeleton with your sword'],
          ['died/%20/skeleton','challenge him to a dance battle'],
          ],
          'image' =>'img/pilar_1.png',
          'enemy' => 'img/skeleton lord.gif'
          ],
          'first_town'=>
          [
          'description' =>'you´ve arrived to the first town of your journey, Woodsmoke, to get some equipment. A humble group of villagers warns you to be careful due to the fact that people are dissapearing recently in the village because of a monster. You as a hero, are asked to kill him, and  in exchange you will get the best sword of the town to kill it.',
          'answers' => [
          ['died/%20/monster','Take the sword and try to kill the monster'],
          ['slime','take the sword and escape'],
          ['died/%20/slime','refuse and leave the town'],
          ],
          'image' =>'img/first_town.jpg'
          ],
          'fishing'=>
          [
          'description' =>'You decided to spend your life as a fisherman, enjoy your new life!',
          'answers' => [
          ['index','thanks'],
          ],
          'image' =>'img/fishing.png'
          ],
          'forest'=>
          [
          'description' =>'You have arrived to the location of the second pillar: The mist forest. Far away you can see an animal similar to an iguana, you love iguanas, and you are doubting whether you should pet it or not.',
          'answers' => [
          ['second_pillar','You continue cause the world is more important'],
          ['died/%20/iguana','You try to pet the iguana'],
          ],
          'image' =>'img/tree.png'
          ],
          'four'=>
          [
          'description' =>'You´ve remembered that you got a special item specifically for this fight. THE BLUE EYES WHITE DRAGON!!!, dropped by the slime you killed when you started your adventure. The demon lord couldn´t whitstand such an impact, and falls right in front of you in tragic death.',
          'answers' => [
          ['end','"this was a hard one, i will always remember this battle"'],
          ['disrespect','"GG EZ" Teabags*'],
          ],
          'image' =>'img/blue.jpg'
          ],
          'math'=>
          [
          'description' =>'In front of you appears the most scary, awful, and dream-desctructor enemy of all.!!!!! A TRIPLE INTEGRAL IN SPHERIC COORDINATES!!!!!, can you answer it?',
          'answers' => [
          ['math','Yes'],
          ['riddle','No'],
          ],
          'image' =>'img/math.png'
          ],
          'obama'=>
          [
          'description' =>'<p class="discrete">at last but not least, a question unsolvable for anyone. what is <a href="http://game.test/game/door">Obama</a>´s last name?</p>',
          'answers' => [],
          'image' =>'img/obama.png'
          ],
          'riddle'=>
          [
          'description' =>'Well done, no one can answer that, but you shall not rest, since you´ve fallen in the riddle dungeon, without the answer you will not pass. Here is the riddle: I am not alive, but I grow. I do not have lungs, but I need air. I do not have a mouth, but water kills me. What am I?´',
          'answers' => [
          ['obama','Fire'],
          ['riddle','Shadow'],
          ['riddle','the earth'],
          ],
          'image' =>'img/acertijo.png'
          ],
          'second_pillar'=>
          [
          'description' =>'The mist has gone away, and you find yourself in front of a giant green stone, IT´S THE PILLAR!, you run into it but your way is blocked by a woman of indescribable beauty, what will you do?',
          'answers' => [
          ['bad_castle','Fight'],
          ['died/%20/flirt','Flirt'],
          ],
          'image' =>'img/pilar_2.png',
          'requires' => ['item' => 'sword', 'death' => 'broken', 'action' => 1]
          ],
          'second_town'=>
          [
          'description' =>'you´ve arrived to the second town, ravinevermilion, and  you are looking for an armour to protect you in your battle at the first pillar. you have no money, and you need the armour urgently, what will you do?',
          'answers' => [
          ['died/%20/work','work for the armour'],
          ['skeletons','steal the armour'],
          ['skeletons/debt','make a loan and buy the armour'],
          ],
          'image' =>'img/coolsville.jpg'
          ],
          'skeletons'=>
          [
          'description' =>'You´ve arrived to the skeleton cave, home of the first pillar, but as soon as you enter you realize that there is a giant party crowded with dancing skeletons, itÂ´s not hostile at all, so you',
          'answers' => [
          ['bakamitai','go to a karaoke pub for a while'],
          ['first_pillar','Go straight to the pillar in order to destroy it'],
          ],
          'image' =>'img/esqueletosj.png'
          ],
          'slime'=>
          [
          'description' =>'You´ve found a wild slime, as you have your sword, you can defend yourself, what are you going to do?',
          'answers' => [
          ['second_town/secret item','slash it'],
          ['second_town','make a home run with him using your sword as a baseball bat.'],
          ],
          'image' =>'img/slime.jpg'
          ],
          'sword'=>
          [
          'description' =>'yo won the battle, it was not hard since all he did was dancing. Now, in your way to the third town, Majula, you found a weird sword in a rock, it looks powerful, and has an inscription in a misterius code: "646f6e2774". you need a sword now that yours is so damaged, what will you do?',
          'answers' => [
          ['died/%20/sword','take the sword'],
          ['third_town','Continue your way'],
          ],
          'image' =>'img/sword.jpg'
          ],
          'thief'=>
          [
          'description' =>'A mean thief tries to assault you with a long sword, but he looks like he is starving, and pretty ill.',
          'answers' => [
          ['forest/sword','"are you ok sir? do you need help?"'],
          ['forest','"you will regret that, i´ll beat you"'],
          ],
          'image' =>'img/otako_culiao.png'
          ],
          'third_town'=>
          [
          'description' =>'You´ve arrived to Majula, it´s been a long battle and you may need rest',
          'answers' => [
          ['forest','I´m strong, i will keep going'],
          ['died/%20/poison','let´s drink something!'],
          ['thief','I guess i´ll take a walk around the town'],
          ],
          'image' =>'img/third_town.jpg'
          ],
          'uno'=>
          [
          'description' =>'it´s been a rough game, you are almost done, and the demon lord is just playing with you, he has prepared an ultimate trap to vanish your existance. when you think nothing could be worse, the demon lord throws four +4 cards',
          'answers' => [
          ['died/%20/uno','What will i do?'],
          ],
          'image' =>'img/4.png',
          'requires' => ['item' => 'secret item', 'death' => '', 'action' => 3, 'answer' => ['four','I still have an ace up my sleeve']]
          ],
          ];

          $deaths = array('monster'=> "You try so hard, but you did´t succeed, such a shame, you died fighting against the monster",

          'slime'=> "You found a wild slime, but you could't defend yourself cause you didn't have a sword, a simple slime killed you, isn't it funny?",

          'work' => "it was a honest decision, but you worked for so long that the world was conquered by the demon lord before you could pay an armour, blame the capitalism",

          'karaoke'=> 'as said before, you enjoyed the apocalipsis with your dear skeleton',

          "skeleton"=> "No one beats a skeleton in a dance battle",

          'sword'=> "the sword was a trap!, how couldn't you see it?, your hands got stuck in the sword and when you were trying to release yourself your arms fell down",

          "poison"=> "Yor drink was poisoned, and you died in the warm embrace of alcohol",

          "tree"=> "Bad luck, a tree stabbed you in the back and killed you. It was not your fault, you are just unlucky",

          "iguana"=> "that was not an iguana, it was a basilisc, you got petrified after touching his tail. I bet you'll now think twice before petting weird animals in the forest",

          "broken"=> "the fight with the skeleton damaged your sword so bad it broke in the middle of the battle in the second pillar, you died",

          "flirt"=> "this is no place to get a partner man, i know you're lonely, but she is 2D, download tinder or something, she killed you",

          "warcry" => "seriously?, think twice before entering a misteryous magic castle screaming, you were killed by a curse in the door",

          "loan"=>"You were doing it great, but you dindn't pay the loan you made to pay the armour, the bank takes your life as payment",

          "uno"=>"you didn't manage to get the secret item to slay the demon lord, you had no chance",

          "final" => "do i have to explain it to you?",

          "default" => "You just died");

          $items = array(
            'sword' => ['name' => 'Thief sword', 'description' => 'Your kindness with the thief made him think about his life, so he gave you his sword and left to look for some answers...'],
            'debt' => ['name' => 'debt', 'description' => 'you´ve got a giant debt, they practically scammed you, i hope you do not encounter them again.'],
            'secret item' =>['name' => 'secret item', 'description' => 'A secret item that looks useless right now but might be useful later']
          );
      if($section == "beginning"){
        $request->session()->forget('inventory');
        session()->put('inventory', []);
      }
      if(isset($sections[$section]['requires'])){
        $requirement = $sections[$section]['requires'];
        if($requirement['action'] == 1 && !isset(session('inventory')[$requirement['item']])){
          $section = "died";
          $death = $requirement['death'];
        }
        elseif($requirement['action'] == 2 && isset(session('inventory')[$requirement['item']])){
          $section = "died";
          $death = $requirement['death'];
        }
        elseif($requirement['action'] == 3  && isset(session('inventory')[$requirement['item']])){
          $sections[$section]['answers'][] = $requirement['answer'];
        }
      }
      if(!empty($death)){
        User::where('username', auth()->user()->username)->increment('Deaths', 1);
        $sections['died']['description'] = $deaths[$death];
      }
      elseif(!empty($item)){
        session()->push('inventory.'.$item, True) ;
        return view('game')->with('info', $sections[$section])->with('item', $items[$item])->with('Deaths',   User::where('username', auth()->user()->username)->get('Deaths')->pop()['Deaths']);
      }
      if( isset( $sections[$section] )){
        return view('game')->with('info', $sections[$section])->with('Deaths',   User::where('username', auth()->user()->username)->get('Deaths')->pop()['Deaths']);
      }
      else{
        return view('index');
      }
    }
}
