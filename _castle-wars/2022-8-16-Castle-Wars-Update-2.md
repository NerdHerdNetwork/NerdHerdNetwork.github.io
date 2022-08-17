---
layout: single
title:  "Castle Wars Update 2 - First-Person Melee Combat, Split Screen, and a minor refactor"
collection: castle-wars
permalink: /castle-wars/sprint2/
sidebar:
  nav: "castle-wars-nav"

---

_By Frank "Weekie" Podraza_

Okay so I’ve been gone for a while. Each one of these devlogs was supposed to be “2-3 weeks of work” and that was very much not the case. I am currently refactoring the sprints to move most of the non-necessary work (like Sound systems, animation systems, modeling) out of the next couple sprints.

Obviously, this video took way longer than it was supposed to, in case this happens again, the best way to support me is by downloading my two games on iOS and Android: Poke My Balls and Launch My Dog. The former is quite old and not great quality, but Launch My Dog is a much better game, and if you want to beat the whole thing it only takes like two hours.

Okay so castle wars: more like some classes, and a war happened. For real I took two classes, and each were significantly challenging, so I’m going to be breaking up this video into three chunks, I’ll call them Epochs, separated by the two classes.

I think I’ve rambled enough…

Epoch one starts in late 2021, like December 18th, or whenever the last devlog was released. I was really excited to keep working. School was out for break, and I had just started binging Gilmore girls. The goal was to build out the second part of the trifecta: weapons. The trifecta is the gameplay loop of movement, weapons, and abilities. 

I created the sword class, which is a container for damage values, ranges, lunge distances, and attack frequencies. I modelled one of the worst swords I’ve seen in a while, made a goofy little animation, created all the UI for the sword. There are the three attacks with cooldowns, an indicator of which one was recently hit, and a blocking indicator. 

I went online and found a sound effect pack for melee combat, though I haven’t used it yet, and added a sound for when you try to attack but the lockout from the previous attack is not over. Yes, it is stolen from half-life.

So, we have a sword, now we need something to hit, right? I took a capsule with a red texture, slapped a name tag and a health bar on the top, made it rotate towards the player, and gave it a health component. 
There’s some sort of a loop with enemies, they are alive, they lose health, at some point they die, and then they need to be respawned. I needed to create something to manage this. Luckily, I noticed that health kits worked the same way, and needed to be respawned. I created a little object management system, and then extended it for enemy management. 

In order to give the enemies some place to hang out, I tore down this wall, added terrain with some more water, and setup some spaces. This one is for the enemies to thrive.

Now we have a sword, and we have something to hit, how do we hit it? I watched a devlog for Chivalry: Medieval Warfare, where the developers talked about having the sword swing, and just tracking what it collides with, and applying the damage to that.  I also added lunging, because the energy sword in Halo has lunging. This is accomplished by always having a lunge trigger in front of the character and keep track of if there are enemies in the trigger. If so, we decide which enemy to lunge towards (line of sight goes first, then the closest in the trigger), and then the character gets lunged towards the enemy. I then added a very simple hit numbers system.

Then Christmas happened, my brother got an oculus quest 2, and I stole it for a few days to play half life alyx. I got so inspired by the holographic UI and city that I started designing swords. There’s going to be 6 or so sword types, and then each type with have variations, aka, forms. One of those forms will be holographic. This is a potential monetization strategy, selling forms, but I think I’d rather put them behind playing the game. The form will just be cosmetic and have no effect on gameplay.

As the holiday break ended, I created a simple FOV effect aggregation system, where each FOV effect is a function parameter, and the FOV is the result of the function, that way we can turn off specific effects, or have them run at the same time, say dashing while sprinting. I also started to use Plastic Source Control, and backup of the game as classes started to ramp up again.

So, in the last devlog I mentioned that I was making a Melee combat game because Bungie decided to make the Destiny 2 gunplay smooth as butter, as has spoiled me. Remember Bungie, my game still has swimming and ladders, I’m still winning. Well, they added the glaive, which is a first-person melee weapon, and feels so good I’m going to have some catching up to do, unless one of the developers who worked on the glaive wants a strictly unpaid internship where they build the same thing for me. Also, I will be adding a glaive into the game.

The class I took which splits Epoch 1 and 2 is Analysis of Algorithms. Yep, I’m turned off now. Just kidding, give me more recursion baby. The class covered how to make recursive algorithms more efficient, or even make them iterative using dynamic programming. Then we deep dived into graphs. The data structure which is a group of nodes that at connected by edges. Now there’s a lot you can do with graphs when it comes to navigation, processing large problems, search, state machines, AI, and a bunch of other things I don’t have time for. The only one we’re going to take away for now, is that this is how we traverse buttons and UI elements on a controller.

Burnt out Frank figured, well I have a week, how hard could controller support be. Each button is a node, keep track of nodes it can move to, and then add the input actions in Unity, boom! Nope!

I added controller input to the character controller, though I still need to implement toggle sprint and toggle crouch, so you don’t need to hold down the stick to sprint.

I made a node class, and a graph class which stored a list of nodes, a starting node, and what to do when we hit the back button. This way we can now have UI “Panes” which we can horizontally traverse using the stick or D-Pad, and then vertically traverse to different panes with A and B (aka affirmative and back)

Playstation controllers just don’t want to work, to my knowledge this is an issue with Unity’s new input system, and not an issue I created. Direct input man: Yes I want my A button to be the horizontal Axis of the left stick, and my right trigger is down on the D-Pad, uh huh. This makes sense.

I gave up on the playstation controller for now and made a component that holds and updates all of the button icons in UI. 

I added a little visor to the player, which is not levelled, looks right out of among us, and goes down when we crouch

I had a plan to extremely overcomplicate the death camera system using graphs. When a player dies, it would find the nearest node from a network of nodes in the level, and then traverse to the “death camera position” Which would be fine if the death camera was where the player was going to spawn. I threw this on the back burner as well, which is now getting full, and will keep getting fuller for a while.

By now it was Friday of spring break, I was running out of days. I hastily added a pause menu, which didn’t play well with dying and/or swapping between keyboard and controller. There were a lot of issues with this, and it wasn’t a great spot to leave the project, but I had to leave it. I gave myself a day or so of a break because I knew what class was about to come. 

I’m a computer science student, which means I have crippling imposter syndrome. But it also means I’m actively taking classes to make me a better programmer. If you remember that’s one of the goals for this project.

Unfortunately, the way this manifests is that I’ll work on the project, then take some time off for a class, and then I realize that everything I’ve already written is flawed in some way. Now, that’s okay, it means I’ve learned something, it means I’m progressing. But it also means that there might be some large gaps in “progress” because I find it better to rewrite existing foundation code, sometimes from the ground up. It’s where I’m not building up, but rather I’m giving myself the ability to build higher. The class I took this past spring is commonly known as one the hardest programming classes at my university: Computer Systems. The class talks about high level concepts such as:
1.	Modularity and other techniques for handling incommensurate scaling
2.	Server client protocols and RPCs, and different system architectures
3.	Virtualization, Emulation, and Aggregation
4.	Multithreading, and splitting work up into chucks (as well as all the bullshit that comes with syncing things: critical regions, busy waiting)

We then take these concepts and must apply them by building a multi-threaded HTTP server in C. This main assignment was split into checkpoints and taught me a few things.
1.	How to handle revisions. Backup and buildup. Refactoring is just as complex as building for the first time. If you don’t put time into planning, you’ll definitely hurt when building.
2.	There are countless ways to reduce complexity in castle wars. If I spent some time and planned some stuff from the top down, I ‘d reduce the complexity from building each system as them come.

I knew I wanted to improve the foundation of castle wars before I continued. I spent a day debating swapping to the Unreal Engine, I debated rewriting the whole thing, or not continuing at all. A couple Days into this mini existential crisis I saw a video by someone named John Leorid, titled: “Watch This Before Working on a Big Game in Unity” and I watched it.

It inspired me to not only keep going, but keep going in Unity, and assured me that it was possible to build a big game in Unity. It also pointed out that most Unity Devlogs are not about large games, and don’t have to take as much complexity into account. If I got the complexity of the systems down to something more manageable, this project could continue.

So here is the big design diagram:

This looks scary, but it makes sense to me. It’s designed like a computer chip, or at least it feels this way. This allows for me to have multiple local players and have either a local server or remote server. This also eliminates cross talk, where controllers weren’t mapped to only one player, or the actions of one player would affect the UI of another. This crosstalk is all rooted in the FindComponentOfType() function.

This design allows me to abstract systems and not have to worry about how they work on the inside. It splits systems into modules. This way I can also re-use many of these systems in future games. I want you to pay close attention to two areas. The top right where handle input, and this bridge where the players interact with the game managers which interact with the server. These are the two areas which I spent the most time on.

Let’s focus on the Player, Manager, Server Model First. I realized pretty quickly that I needed to rip apart a lot of the player’s systems to make them able to be duplicated in order to allow for Split Screen. This is how I played castle wars in halo reach with friends, so I wanted to build it into the game. When I say cross talk, this is what I mean. We have a component that needs to reference a player, but the player doesn’t exist yet, so it must be found when a player is spawned. Well, when we spawn multiple players, the references get mixed up. The player prefab now contains a player input component, an input bootstrapper (we’ll get into those two later), as well as a player prefab and a UI. All the component references are settled with the prefab, and thus there is no need to find any of them. I also combined all three UIs into one, the HUD, Death Menu, and Pause menu. I keep track of the player’s state and change the UI accordingly. 

The game manager now holds an array of local players, as well as their UIs and Death Cameras. The game manager sets camera properties when players are spawned, which splits the screen, and orders the cameras correctly. The game manager also keeps track of per-player rendered things.

Quick note: There’s 4 layers of rendering per player now: 
1.	The world/Third person weapon models
2.	First person weapon models
3.	World space UI like name tags
4.	Camera space UI

The game manager keeps track of the weapon models and name tags that need to be rendered per player so that each player, say: turns off all other local player’s first-person weapons so they aren’t rendered on top of the level because they’re on the weapon layer. It only needs to keep track of local player things because networked players will only have third person models and won’t need the nametags to face them on the local computer, just on their own.

The game manager handles sound management because there can only be one audio listener at a given time and we need to aggregate all the local players sounds.

Lastly, the game manager takes any server calls for the player and gets them to the server, either local or remote)

Finally, the server. The server handles global game settings like respawn times, per team prefabs and death camera, spawn points, health regen settings. It stores networked objects and a list of players. The server also keeps track of respawn timers for players. And tells the game manager when/where to spawn a given player. The next sprint is going to be networking, so much more server stuff will come next time.
Okay, now let’s look at the other section I wanted to point out on the diagram: Input. So, I had to refactor all of this because hitting a button on one controller would propagate to all players. My original solution of keeping track of each player’s devices and validating input that way didn’t work because then you could only press a button on one controller at a time, which isn’t ideal.

I did make this input setup screen; you need multiple controllers for multiple players. Keyboard/Mouse only active for the first player. Player 1 would control the menu, and the other players can pull up their settings.

To solve the input validation problem, I bit the bullet, and I started using the player input component. This takes a list of input mapping, and signals events when the input maps are detected. This event goes to the Input bootstrapped, which directs the input to either the UI or the player, depending on the state of the player. So now, after a decent chunk of time, I have working split screen!

I then fully implemented the pause menu from Epoch 2 and started writing this video. 

These devlogs are likely going to get more and more complex. Naturally as I add in networking, the programming concepts are going to get more and more complex as the game grows. This is going to be a huge project. The largest I’ve undertaken. 

As mentioned earlier: I haven’t seen any large game devlogs (or at least of finished games) and I kind of want to do that. There aren’t any tutorials on it either. I figured, maybe I could teach some of it. I could at least give people some sort of expectation that it isn’t going to be all fun and games, game development isn’t just map design, character design, animating, and sounds.

I still want to show all of that because it’s fun, but I also want to explain some of the fundamental programming concepts that come with building large games. Game development isn’t just building a world, it’s an ever-growing task that can easily get out of hand and overwhelm you if you don’t stop every once in a while to plan ahead and limit yourself when necessary.

I’ll likely make “Asides” on programming concepts, because having 10, arguably boring, minutes of discussing computer science concepts in the middle of a devlog isn’t very fun. I’ll try to make them engaging, but at least accurate. I don’t fully know what I’m doing, but if I can figure it out well enough to teach it, I’ll at least have a way of combating imposter syndrome. Also, since the goal is to create an accurate source, if anything I say is incorrect, please let me know in the comments.

Okay, if you made it this far in the video, subscribe, like it, you know the drill. I made a mailing list and a TikTok which I’m going to use as further avenues of drumming up promotion of the game until it’s out. If you want to support me, the best way to do that is to play my mobile games Poke My Balls and Launch My Dog.

Real Quick record time: Kid Amnesia, Room on Fire, Under Great White Northern Lights, and Tame Impala’s live versions. 

Okay I’ll see you next time.
