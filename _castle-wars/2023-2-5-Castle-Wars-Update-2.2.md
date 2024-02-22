---
layout: single
title:  "Castle Wars Update 2.2 - Making Enemies that fight back"
collection: castle-wars
permalink: /castle-wars/sprint2/2/
sidebar:
  nav: "castle-wars-nav"
---

_By Frank "Weekie" Podraza, Feb. 5, 2023_

<iframe width="560" height="315" src="https://www.youtube.com/embed/OYkHSwbJxcE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
---

I've been working on developing and improving the combat system (update out soon), and the only way to truly test the combat is by fighting something. The enemies are currently these static, pill-looking things that don't do anything. Other than being a slight allegory for myself, they don't do much. This update is going to be improving the enemies slightly. Both giving them the ability to move and then giving them the ability to attack.

## Combat Zone

I don't like the idea of enemies following you all around the map right now. I am a generally lazy person and that would involve programming a NavMesh system and better AI for the enemies to allow jumping and sophisticated obstacle avoidance. To avoid all that work, I created a zone on the map in which the enemies are told it's okay to attack.

![combat-zone-image-center](/assets/images/castle-wars/update2.2/CombatZone.png){: .align-center}

## Letting the enemies move

When the enemies are in this zone, the zone will give them a target (player object) which is also in the zone. The enemies will only attempt to navigate to the target if they are given one. I hadn't done any movement programming in a while, so I ran into a few issues. These are both my mathematical errors, as well as issues with using transform translating to move the enemies.

![floating-image-center](/assets/images/castle-wars/update2.2/enemiesFloating.gif){: .align-center}

![overlapping-image-center](/assets/images/castle-wars/update2.2/overlapping.gif){: .align-center}

I then realized that I needed to move the enemies using the physics system somehow. This was to avoid enemies "phasing through" objects, including other enemies. Here was physics attempt one

![dogpile-image-center](/assets/images/castle-wars/update2.2/dogpile.gif){: .align-center}

I then locked their rotation, but they still jumped too quickly toward the player

![tooQuickly-image-center](/assets/images/castle-wars/update2.2/tooQuick.gif){: .align-center}

So I tuned how quickly the enemies could move, so now they slowly (and ominously) move toward the player

![normal-speed-image-center](/assets/images/castle-wars/update2.2/correctSpeed.gif){: .align-center}

## Giving the enemies swords

Okay so now the enemies have a target, and can appropriately move towards the target. Now they need to be able to attack, so we have to give them a sword. I copied the prefab for the player weapon and put it onto the enemy prefab. I wrote a quick sword controller for it, which just waits a few seconds, picks an attack, and then when in range will attack, and loop in a cycle.

![attacking-image-center](/assets/images/castle-wars/update2.2/enemiesAttack.gif){: .align-center}

Now the enemies can attack. I set them to do half the damage because they'd gang up on the player and kill them too quickly. 

## Blocking

The last thing I wanted to implement was player blocking. When the player is blocking, and is attacked, the health component will recognize that the attack was blocked (given it's within a certain angle in front of the player). This will send a signal to the combat manager component, and it will just not take the damage. I am unsure if in the future I want to implement a parry opportunity system, stats to block amounts of damage, or block angle (right now the default is 90 degrees).

![blocking-image-center](/assets/images/castle-wars/update2.2/blocking.gif){: .align-center}

## That's all, Folks

That's about it, this is a quick one, it took me much less time to make this update (development, video, and blog post), but it covers a lot less. I might do some of these smaller updates when there are specific things to talk about. I do recommend watching the video, usually, these posts are conversions of the video script, but this one is a product of me trying to emulate the video, and that leaves out some bits.

Anyway, the records I was listening to that I wanted to shout out are:

1. Alvvays - Blue Rev
2. Jockstrap - I Love You Jennifer B.

I'll see you soon for the combat update,

Frank