<?php
session_start();
if (!$_SESSION["username"]) 
{
  header("Location: HOMEPAGE.php");
}
?>

<!DOCTYPE html>
<!-- saved from url=(0029)http://bootswatch.com/cyborg/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>NTCS Weapons-Firearm Safety</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="http://bootswatch.com/cyborg/bootstrap.css" media="screen">
    <link rel="stylesheet" href="http://bootswatch.com/assets/css/bootswatch.min.css">
	<link rel="stylesheet" href="CSSstyle.css">
    <link rel="icon" href="logo.png">
	
    <script type="text/javascript" async="" src="./Bootswatch  Cyborg_files/ga.js"></script>
	<script>

     var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-23019901-1']);
      _gaq.push(['_setDomainName', "bootswatch.com"]);
        _gaq.push(['_setAllowLinker', true]);
      _gaq.push(['_trackPageview']);

     (function() {
       var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
       ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
       var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
     })();

    </script>
  </head>
  <body>
  
	<!-- Navigation Bar -->
	<?php include "NAVBAR.php" ?>
	
	<div class="container">
    <!-- Containers  -->
      <div class="bs-docs-section">
        <div class="row">
          <div class="col-lg-12">
            <div class="page-header">
              <h1 id="forms"  align="center" >Firearm Safety</h1>
              <h6 id="forms" align="center"> As provided by NSSF.org</h6>
            </div>
            
			<div class="bs-component">
              <div class="jumbotron">
                <h3>Always Keep The Muzzle Pointed In A Safe Direction.</h3>
					<p>This is the most basic safety rule. If everyone
					handled a firearm so carefully that the
					muzzle never pointed at something they
					didn't intend to shoot, there would be
					virtually no firearms accidents. It's as
					simple as that, and it's up to you.</p>
					
					<p>Never point your gun at anything you
					do not intend to shoot. This is
					particularly important when loading
					or unloading a firearm. In the event
					of an accidental discharge, no injury can occur
					as long as the muzzle is pointing in a safe direction.</p>
					
					<p>A safe direction means a direction in which a bullet
					cannot possibly strike anyone, taking into account
					possible ricochets and the fact that bullets can
					penetrate walls and ceilings. The safe direction may
					be "up" on some occasions or "down" on others,
					but never at anyone or anything not intended as a
					target. Even when "dry firing" with an unloaded gun,
					you should never point the gun at an unsafe target.</p>
					
					<p>Make it a habit to know exactly where the muzzle
					of your gun is pointing at all times, and be sure that
					you are in control of the direction in which the
					muzzle is pointing, even if you fall or stumble. This
					is your responsibility, and only you can control it. </p>
              </div>
            </div>
          
			<div class="bs-component">
              <div class="jumbotron">
                <h3>Firearms Should Be Unloaded When Not In Use.</h3>
					<p>Firearms should be loaded only when you are in the
					field or on the target range or shooting area, ready to
					shoot. When not in use, firearms and ammunition
					should be secured in a safe place, separate from each
					other. It is your responsibility to prevent children and
					unauthorized adults from gaining access to firearms or
					ammunition.</p>
					
					<p>Unload your gun as soon as you are finished. A
					loaded gun has no place in or near a car, truck or
					building. Unload your gun immediately when you
					have finished shooting, well before you bring it into a
					car, camp or home.</p>
					
					<p>Whenever you handle a firearm or hand it to someone,
					always open the action immediately, and visually
					check the chamber, receiver and magazine to be
					certain they do not contain any ammunition. Always
					keep actions open when not in use. Never assume a
					gun is unloaded. Check for yourself! This is considered
					a mark of an experienced gun handler!</p>
					
					<p>Never cross a fence, climb a tree or perform any
					awkward action with a loaded gun. While in the field,
					there will be times when common sense and the basic
					rules of firearms safety will require you to unload your
					gun for maximum safety. Never pull or push a loaded
					firearm toward yourself or another person. There is
					never any excuse to carry a loaded gun in a scabbard,
					a holster not being worn or a gun case. When in
					doubt, unload your gun!</p>
              </div>
            </div>
          
			<div class="bs-component">
              <div class="jumbotron">
                <h3>Don't Rely On Your Gun's "Safety".</h3>
					<p>Treat every gun as though it can fire at any
					time. The "safety" on any gun is a mechanical
					device which, like any such device, can become
					inoperable at the worst possible time. Besides, by
					mistake, the safety may be "off" when you think it
					is "on." The safety serves as a supplement to proper
					gun handling but cannot possibly serve as a substitute
					for common sense. You should never handle
					a gun carelessly and assume that the gun won't
					fire just because the "safety is on."</p>

					<p>Never touch the trigger on a firearm until you
					actually intend to shoot. Keep your fingers away
					from the trigger while loading or unloading.
					Never pull the trigger on any firearm with the
					safety on the "safe" position or anywhere in
					between "safe" and "fire." It is possible that the
					gun can fire at any time, or even later when you
					release the safety, without your ever touching the
					trigger again.</p>

					<p>Never place the safety in between positions, since
					half-safe is unsafe. Keep the safety "on" until you
					are absolutely ready to fire.</p>

					<p>Regardless of the position of the safety, any blow
					or jar strong enough to actuate the firing mechanism of a
					gun can cause it to fire. This can happen even if the
					trigger is not touched, such as when a gun is
					dropped. Never rest a loaded gun against any
					object because there is always the possibility
					that it will be jarred or slide from its position
					and fall with sufficient force to discharge. The
					only time you can be absolutely certain that a
					gun cannot fire is when the action is open
					and it is completely empty. Again, never rely
					on your gun's safety. You and the safe gun
					handling procedures you have learned are
					your gun's primary safeties.</p>
              </div>
            </div>
			
			<div class="bs-component">
              <div class="jumbotron">
                <h3>Be Sure Of Your Target And What's Beyond It.</h3>
					<p>No one can call a shot back. Once a gun fires, you
					have given up all control over where the shot will
					go or what it will strike. Don't shoot unless you
					know exactly what your shot is going to strike. Be
					sure that your bullet will not injure anyone or
					anything beyond your target. Firing at a movement
					or a noise without being absolutely certain of what
					you are shooting at constitutes disregard for the
					safety of others. No target is so important that
					you cannot take the time before you pull the
					trigger to be absolutely certain of your target and
					where your shot will stop. </p>

					<p>Be aware that even a 22 short bullet can travel
					over 11/4 miles and a high velocity cartridge, such as
					a 30-06, can send its bullet more than 3 miles. Shotgun
					pellets can travel 500 yards, and shotgun slugs have a
					range of over half a mile.</p>

					<p>You should keep in mind how far a bullet will
					travel if it misses your intended target or
					ricochets in another direction.</p>
              </div>
            </div>
			
			<div class="bs-component">
              <div class="jumbotron">
                <h3>Use Correct Ammunition.</h3>
					<p>You must assume the serious responsibility of using
					only the correct ammunition for your firearm. Read and
					heed all warnings, including those that appear in the gun's
					instruction manual and on the ammunition boxes.</p>

					<p>Using improper or incorrect ammunition can destroy a gun
					and cause serious personal injury. 
					It only takes one cartridge of improper caliber or
					gauge to wreck your gun, and only a second to
					check each one as you load it. Be absolutely certain
					that the ammunition you are using matches the
					specifications that are contained within the gun's
					instruction manual and the manufacturer's markings
					on the firearm.</p>

					<p>Firearms are designed, manufactured and proof
					tested to standards based upon those of factory
					loaded ammunition. Hand-loaded or reloaded
					ammunition deviating from pressures generated by
					factory loads or from component recommendations
					specified in reputable hand-loading manuals
					can be dangerous, and can cause severe damage to guns and serious injury to the shooter. Do not use
					improper reloads or ammunition made of
					unknown components.</p>

					<p>Ammunition that has become very wet or has
					been submerged in water should be discarded in a
					safe manner. Do not spray oil or solvents on
					ammunition or place ammunition in excessively
					lubricated firearms. Poor ignition, unsatisfactory
					performance or damage to your firearm and harm
					to yourself or others could result from using such
					ammunition. </p>

					<p>Form the habit of examining every cartridge you put
					into your gun. Never use damaged or substandard
					ammunition. The money you save is not worth the
					risk of possible injury or a ruined gun.</p>
              </div>
            </div>
			
			<div class="bs-component">
              <div class="jumbotron">
                <h3>If Your Gun Fails To Fire When The Trigger Is Pulled, Handle With Care!</h3>
					<p>Occasionally, a cartridge may not fire when the
					trigger is pulled. If this occurs, keep the muzzle
					pointed in a safe direction. Keep your face away
					from the breech. Then, carefully open the action,
					unload the firearm and dispose of the cartridge in
					a safe way.</p>

					<p>Any time there is a cartridge in the chamber, your
					gun is loaded and ready to fire even if you've tried
					to shoot and it did not go off. It could go off at any
					time, so you must always remember Rule #1 and
					watch that muzzle!</p>
								
					<p>Discharging firearms in poorly ventilated areas,
					cleaning firearms or handling ammunition
					may result in exposure to lead and other
					substances known to cause birth defects, reproductive
					harm and other serious physical injury. Have
					adequate ventilation at all times. Wash hands
					thoroughly after exposure.</p>
              </div>
            </div>
			
			<div class="bs-component">
              <div class="jumbotron">
                <h3>Always Wear Eye And Ear Protection When Shooting.</h3>
					<p>All shooters should wear protective shooting
					glasses and some form of hearing protectors while
					shooting. Exposure to shooting noise can damage
					hearing, and adequate vision protection is essential.
					Shooting glasses guard against twigs, falling shot,
					clay target chips and the rare ruptured case or
					firearm malfunction. Wearing eye protection when
					disassembling and cleaning any gun will also help
					prevent the possibility of springs, spring tension
					parts, solvents or other agents from contacting
					your eyes. There is a wide variety of eye and
					ear protectors available. No target shooter,
					plinker or hunter should ever be without them.</p>

					<p>Most rules of shooting safety are intended to
					protect you and others around you, but this rule
					is for your protection alone. Furthermore, having
					your hearing and eyes protected will make your
					shooting easier and will help improve your enjoyment
					of the shooting sports.</p>
              </div>
            </div>
			
			<div class="bs-component">
              <div class="jumbotron">
                <h3>Be Sure The Barrel Is Clear Of Obstructions Before Shooting.</h3>
					<p>Before you load your firearm, open the action and be certain that
					no ammunition is in the chamber or magazine. Be sure the barrel
					is clear of any obstruction. Even a small bit of mud, snow, excess
					lubricating oil or grease in the bore can cause dangerously increased
					pressures, causing the barrel to bulge or even burst on firing,
					which can cause injury to the shooter and bystanders. Make it a
					habit to clean the bore and check for obstructions with a cleaning
					rod immediately before you shoot it. If the noise or recoil on
					firing seems weak or doesn't seem quite &quot;right,&quot; cease
					firing immediately and be sure to check that no obstruction or
					projectile has become lodged in the barrel.</p>

					<p>Placing a smaller gauge or caliber cartridge into a gun (such
					as a 20-gauge shell in a 12-gauge shotgun) can result in the smaller
					cartridge falling into the barrel and acting as a bore obstruction
					when a cartridge of proper size is fired. This can cause a burst
					barrel or worse. This is really a case where &quot;haste makes
					waste.&quot; You can easily avoid this type of accident by paying close 
					attention to each cartridge you insert into your firearm.</p>
			  </div>	
            </div>
			
			<div class="bs-component">
              <div class="jumbotron">
                <h3>Learn The Mechanical And Handling Characteristics Of The Firearm You Are Using.</h3>
					<p>Not all firearms are the same. The method of
					carrying and handling firearms varies in accordance
					with the mechanical characteristics of each gun.
					Since guns can be so different, never handle any
					firearm without first having thoroughly familiarized
					yourself with the particular type of firearm you are
					using, the safe gun handling rules for loading,
					unloading, carrying and handling that firearm, and
					the rules of safe gun handling in general.</p>

					<p>For example, many handgun manufacturers
					recommend that their handguns always be carried
					with the hammer down on an empty chamber. This
					is particularly true for older single-action revolvers,
					but applies equally to some double-action revolvers
					or semi-automatic pistols. You should always read
					and refer to the instruction manual you received
					with your gun, or if you have misplaced the manual,
					simply contact the manufacturer for a free copy.</p>

					<p>Having a gun in your possession is a full-time job.
					You cannot guess; you cannot forget. You must
					know how to use, handle and store your firearm
					safely. Do not use any firearm without having a
					complete understanding of its particular
					characteristics and safe use. There is no such
					thing as a foolproof gun.</p>
			  </div>	
            </div>
			
		  </div>
        </div>
      </div>
	  
	  <!-- Footer -->
	<?php include "FOOTER.php" ?>
	  
    </div>

	<script src="jquery-1.js"></script>
    <script src="bootstrap.js"></script>
    <script src="bootswatch.js"></script>

</body></html>
