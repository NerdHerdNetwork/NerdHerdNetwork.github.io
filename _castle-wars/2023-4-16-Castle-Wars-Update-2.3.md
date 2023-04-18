---
layout: single
title:  "Castle Wars Update 2.3 - First-Person Melee Combat, Split Screen, and a Minor Refactor"
collection: castle-wars
permalink: /castle-wars/sprint2/3/
sidebar:
  nav: "castle-wars-nav"
---

_By Frank "Weekie" Podraza, Apr. 16, 2023_

Video would go here
---

Hey there! I’ve been working on Castle Wars, and the combat system thus far has been kind of… lacking. 

## Basic Animations

As far as animations go, there was a primary attack, and an idle animation. It was the bare minimum to try and get the attacks dealing damage, but there were no secondary and melee attacks, and no blocking/sheathing ability. 

![old-primary-image-center](/assets/images/castle-wars/update2.3/oldPrimary.gif){: .align-center}

I set out to add more animations, as well as improve the current ones to feel much better. This also required overhauling lunging, the hit detection system, adding procedural weapon sway, and a lot of research.

I figured my first step was to add arms. I had an arms model lying around from a NatureManufacturer asset I aquired in a humble bundle a while ago. I hope using it makes me feel less buyer's remorse.

![arms-image-center](/assets/images/castle-wars/update2.3/arms.png){: .align-center}

Unity has a package called 'Animation Rigging' which has a nice bone and Inverse Kinematics (IK) system, so I added that package and rigged the arms. It gives me these two target points for each arm that I can move to where I want the hands to be and the IK system will do the rest of the work for me.

![arms-moving-image-center](/assets/images/castle-wars/update2.3/movingArmTargets.gif){: .align-center}

I was then able quickly animate a...

1. New primary attack
2. A secondary attack
3. A 'melee' attack (a punch)
4. To blocking
5. From blocking
6. A blocking loop
7. Unsheathing
8. Sheathing

The animations still weren't 100%, but maybe 40%. I'm sure this will not come back to bite me later.

## Animation Controller

Here is the layout of the Animation Controller. 

![controller-image-center](/assets/images/castle-wars/update2.3/animatorController.png){: .align-center}

The general layout is that any state (including the beginning state) can go to unsheathing, which then go's to idle. From idle, an attack can be taken place, the player can start blocking, or sheathe the sword.

When the player is attacking, blocking, or the sword is sheathed, the sword will stay in that state until updated by the weapon controller.

## Weapon Sway

Rather than attempting to animate weapon sway manually, I decided to procedurally animate all of it. The weapon's sway position is calculated and then applied before every rendered frame. It is calculated by aggregating a bunch of individual functions which return vectors.

![movement-sway-image-center](/assets/images/castle-wars/update2.3/WeaponSway.gif){: .align-center}

## Sheathing

Sheathing is actually a necessity, the sword will start sheathed, then enter the idle state. If the player climbs a ladder or swims in water the sword will be sheathed, which disables attacks and blocking for the duration of the movement.

![sheathing-image-center](/assets/images/castle-wars/update2.3/Sheathing.gif){: .align-center}

## Better Animations

So you know how that my animating wouldn't come back to bite me? It did. It just felt off. I couldn't exactly figure out why it felt off, but I knew that it was. The animations felt float-y, and like the sword had no air, and that no effort was being put into it.

I decided that my lack of playing sword-combat games was likely the cause of this, so I put together a required reading list. (Feel free to message me with more suggestions). The list was:

1. Halo Reach (where I got the idea for the game, hadn't played in a while)
2. Minecraft (Not much to learn from this one, got sucked in for a couple weeks anyways)
3. Breath of the Wild (I picked up a switch in the early winter, god this is such a good game)
4. Skyrim (I tried, I promise, I really just can't seem to get into it)
5. Valheim 

Breath of the wild was where I first noticed how short the actual attack animations are. I started examing Halo Reach energy sword swing animations, and I catalogued the pacing proportions of each part of the swing animation. The swing itself was only a sixth of each animation. The first third was the windup, then the next sixth was the swing, and the remaining half was the follow-through and reset.

There was also hint of camera shake which indicated that the player's head was getting pulled by the momentum of the swing. Also, the sword was pulled off screen during the wind-up and went fully off screen after the swing itself. This is the sell the breadth of the swing, as well as to make the animator's life easier.

I also added sounds. You need sounds to sell visuals. I added sounds for:

1. The swing "swooshing" the air around it.
2. Vocal effort from the player character (this doesn't play every swing, becayse tat would get annoying)
3. Enemy hit (flesh) sounds
4. Surface hit sounds (sword, wall, ground)

Most of these elements are subtle enough that I usually don't notice them, but subconsiously my brain did.

![primary-image-center](/assets/images/castle-wars/update2.3/PrimarySwing.gif){: .align-center}

## New Hit Detection

I wanted to revamp the hit detection. It worked by attaching a collider to the sword, and letting that collider pass through things in the swords path, applying damage to what it collided with. This means that both: changing the animations changes hit detection, and the hit detection would be effected by the weapon sway.

To rememdy this I created a collider that is parented to the player, which isn't affected by weapon sway, and plays an animation to move the collider. It generally matches the swing motion, but I can slightly modify the swings to perfect the animations.

![hit-detection-image-center](/assets/images/castle-wars/update2.3/HitDetection.gif){: .align-center}

## Lunging Overhaul

I feel that lunging is necessary, since it is integral to making the Halo sword combat work. Halo is an arcade shooter, and thus it doesn't have melee combat mechanics that punish you very hard. It has lunging to make sure that your attacks land. 

I already had lunging. It was clunky, after detecting a lunge target, the player would lunge to the target's position over 0.3 seconds. This had 3 main issues.

1. The lunge would be 0.3 seconds regardless of distance, which means that extremely short distances would lock the player out of attacking of 0.3 seconds, which is noticable. The player now attacks when in range of the attack
2. The lunge target could move, but the player would continue to move to the position the target was when the lunge began. This is evidence I built lunging with static enemies. 
3. Because the lunge target could move, this meant that the player could overlap the target if the target moved towards the player. Lunging now ends when the player is about to overlap with the target.

![lunging-image-center](/assets/images/castle-wars/update2.3/SecondaryLunge.gif){: .align-center}

Lunging is also now a per-attack feature. I may reverse this eventually, but it will probably add balancing ability.

## Sword Drops and next time

I also implemented sword pickup objects. Right now interaction just picks up the object. They do swap the player's active weapon yet. I am going to implement this once I've added more swords. 

Speaking of more swords. I am going to add 4 more swords. That should be enough to playtest the game. There will be a short video on each sword, which will be linked below. The 4 swords I'll be adding is:
1. K-Type (Katana)
2. G-Type (Glaive)
3. E-Type (Energy Sword)
4. S&S-Type (Sword and Shield pair)

Quick record time/Recommendations:

1. Benches - Their singles (Violent, LA Friends, It doesn't Have to Change, Mephisto's Waltz, Common Sense, I don't Make Me)
2. The Strokes - Comedown Machine
3. Black Country, New Road - Live at Bush Hall 
4. The Velvet Underground - Loaded