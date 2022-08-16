---
layout: single
title:  "Castle Wars Update 1 - Project Goals, Character Controller, FPS Movement"
collection: castle-wars
permalink: /castle-wars/sprint1/
sidebar:
  nav: "castle-wars-nav"

---

_By Frank "Weekie" Podraza_

## Intro / Project Start

<iframe width="560" height="315" src="https://www.youtube.com/embed/PfAUCvGBT7Y" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
---

So I recently finished my game, Launch My Dog which is available on mobile. I'd been working on that game for a year and a half, so I had some ideas piled up for new projects. I want to push myself. Poke My Balls was my first released game. Launch My Dog was my second, a small polished experience that I'm incredibly proud of. I figured out where I wanted to go from here.

I've known for a while that I wanted to get out of mobile development. You can do very interesting things on mobile, but the development workflow is tiring and clunky to me. I wanted to make a PC game next. I've toyed around with FPS games in the past, there's the Field of Fire prototype that still haunts me on the Nerd Herd Network Channel as well as an FPS game I was making from scratch on the Weekie channel. I want to make a First person PC game, but not a shooter.

<iframe width="560" height="315" src="https://www.youtube.com/embed/bSdYJA8JBgw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
---

<iframe width="560" height="315" src="https://www.youtube.com/embed/ehYH7rGdRPA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
---

The biggest issues with Launch My Dog are replay-ability and staying power. Once you 3-star all the Launch My Dog levels the game is over and there's no reason to return to it. Multiplayer games are easier for me to stick with personally because they are an outlet to hang out with friends. I want this PC game to be centered around multiplayer.

So, it’s time to start a new game, which is a daunting process. You basically lay out what your life is going to be like in the foreseeable future. There's absolutely no way for you to plan everything. Even in the past few weeks I've done so much more than I originally intended to because there was stuff I forgot to think about. Here's what I got for the game concept.

The first FPS game I played was halo reach. Me and my friends played a custom game mode called castle wars. We played on a map that was two castles with only a wide bridge between them. We could play that for hours and have fun the entire time. I want to turn that game mode into a full game.

It will be called "Castle Wars"... or at least that's the running title. The first thing I did was write a design document. I put on a Queens of the Stone Age album, and wrote 14 pages with every thought I had at the time. Okay, obviously I wrote for way longer than 1 album, there was also some Strokes, Radiohead, Interpol, and a little bit of Kanye. It took the whole day to write.

## Design Document and Goals

The design document goes over things like the player character, environments for maps, how combat and movement will work, how this game compares to and is inspired from other games. It also covers areas like: menu flow, multiplayer modes, and what technologies will be required to make this game work. The main goal of a design document is keeping the project in scope. I intend to work on this for upwards of a year and a half and my perception of what deserves to be in the game will change, so the design document acts as a baseline.

My next step, which was somewhat easier, is coming up with a set of goals for this project:
1. Use the universal render pipeline. Those with an astute eye would notice that Launch My dog originally used the URP, but I downgraded because the portal slicing shader was not written in URP, and I don't know how to write shaders.
2. A Sci-Fi Medieval Art Style, generally low poly. This way it's not trying to look realistic and will be easier to make it look good.
3. Smooth movement and combat, you should fight enemies not the controls. I've been spoiled with buttery goodness of Destiny 2's movement and gunplay to the extent that almost all over shooters feeling clunky. The Metro series, the Battlefield series, and Rainbow Six: Siege all feel clunky to me now.
4. Juice. Everything should be dynamic and animated. This was the game feels like a game and not a simulation. Sound cues are also a good way of adding juice.
5. Better Scripting. I am a programmer at heart, and I want to become a better programmer trough this project. Not making all variables public, using functions to edit variables from other classes, and having each class do only one thing, are just the tip of the iceberg.
6. Keep prefabs small, and malleable. Launch My Dog had a launcher prefab, and a bun prefab, each of which was very extensive and easy to drastically fuck up.
7. Inclusivity with character options. I want to have my players feel comfortable with who they look and sound like in game. The game takes place in the future and a less binary future is the future I wish for. I am willing to put in more work adding more options for people to feel comfortable.

Those goals are like the "learning outcomes" of a college course, I'm gonna keep them in my mind during development and I'm going to stick to those core tenets. So how exactly will I work?

I started using a sprint-based system for Launch My Dog development. A sprint should be enough work for 2-ish weeks, and at the end of the sprint the game should be a playable improvement over the last iteration. The feel of the game should be better at the end. I will make a DevLog after most sprints (unless they are really boring) and a blog post after every sprint. I want to be able to market the game well before release and DevLog seem to be a good way of promoting the game and building an audience.

I believe Castle Wars is a much more marketable game than Launch My Dog. Nobody wanted to watch videos about me making a hot dog physics game, but my FPS dev logs did okay despite me never promoting them.

Back to sprints. I had to convert the design document to sprints. Luckily, the last section of my design document was a "work progression" list that contains the basic sprint ideas. more specific items will come later. The first few sprints are
1. Character Controller and movement
2. Basic combat
3. Basic multiplayer
4. a more full character controller

This blog post is on the first sprint. I worked on the character controller and forms of movement. I started off with a package from the asset store called Easy Character Movement 2, or ECM2 for short. I downloaded it and started learning how it handled characters, input, and movement. I also had to learn how to use Unity's new input system, which wasn't too bad. luckily ECM2 came with examples of different movement types, which I could easily understand and compile into my custom character class.

Side note: I wrote a very simple auto-save script, and I'd recommend you do too, it saves you so much time in the long run.

## Player Movement / ECM2

The first ability I added was a dash. Immediately I knew I had to fix something because you could dash infinitely. I added a cooldown, as well as the ability to enable / disable the cooldown in the player component. This is a general theme I want with the game: Generalization and Customizability. This way I can expose as many custom game options to the player as possible. Since this game idea came from a custom game mode, why not breed that inspiration.

I also followed the ECM2 examples to add in:
- Double Jump
- Slide
- Swimming
- Ladders

![image-right](/assets/images/castle-wars/update1/trainingground.PNG){: .align-center}

I also needed a training map to help with testing all of this. I build a simple running around and jumping area along with:
- Physics objects
- Ladders, (Me, 1. Destiny 2, 0.)
- Portals (Teleporters, really)
- A Kill-plane
- A swimming pool
- Health kits
- A health pool
- A soon to be interactable health/damage cubes.

## UI Systems

Then I had to develop the basic forms of 3 UI systems in tandem. Those systems being an interaction system, a health system, and HUD / In-Game UI system. You can't have an interactable health kit and death cube without a way of graphically showing when and how the player will interact with, and give feedback from the interaction.

The interaction system was easy, just periodically check what's directly in front of the player camera by casting a ray, and check if that ray intersects with anything. The other half of the system is the interactable item parent class which contains info like what to tell the player it, and what to do upon interaction. I said parent class because you can derive from this class and edit the behavior of the interaction.

The basic UI was fun, I personally like making UI. Oh, how boring is that? It's true though. I made a basic progress bar showing the dash cooldown, a panel showing how much oxygen the player have left (more on that later). The bottom left panel will be for abilities, and bottom right for weapons. These might get combined later. There's also a dummy scoreboard, and a health bar.

![image-left](/assets/images/castle-wars/update1/BasicUI.PNG){: .align-center}

Oh yes, the health system. I made a parent class called health, which allows any object to interact with another's health amount through functions. As well as things like enabling/disabling health regeneration, and if the object with the health dies. The player's health class controls the values for the health bar. The health bar fades out at full health, only showing if you have less than full health, and turns more and more red below the 40% threshold.

There are 3 layers, UI, weapons, and main. The main layer captures everything, the weapon layer is going to be just the first person view of the weapon, and the UI layer us just the UI. This way I can change the main camera POV without stretching the weapon, and the weapon will always appear above on geometry it might go in to.

## Main Systems

Next I set up a death management system. This consisted of a script that manages when the active character dies, and when to respawn them. It handles disabling input on the character that died. There is a map camera that gets shown when the player dies and a little respawn UI to let the player know when they'll respawn.

You can die to:
- The death cube
- The killplane
- Fall damage
- Drowning

Respawning is tiered, meaning there is a waiting period, an optional respawn period, and a forced respawn timer. All of this is configurable. By default: you must wait for a set amount of time, then you have the option to respawn for some time. Finally, if force respawn is enabled then after another length of time the player just respawns. This was it will be very easy to configure game settings later on.

![image-right2](/assets/images/castle-wars/update1/tiered-respawn.png){: .align-center}

Speaking of game settings, we're gonna need something to manage them, I made an object that holds settings and can be referenced when needed. I want to use Unity's scriptable object system, but I also want the players to be able to configure the game when creating a room, so I am hesitant.

The next set of systems I added in spawn points. I used to use UFPS and their spawn point system had an in-editor component that visually depicted where it was and where it was looking. I learned a good bit about how to use gizmos in the unity editor and was able to achieve this in-editor only effect, the only other parameter for spawnpoints is the team that can use it. Red, Blue, or No assignment. No assignment meaning either, this is for testing purposes. The death manager finds all available spawnpoints and sorts through them for the team it's trying to spawn. Later I'll add in other means of sorting like those with players near for spawncamping protection.

![image-left](/assets/images/castle-wars/update1/spawnpoint.PNG){: .align-center}

I said that I'd talk more about swimming. When you're in the water you have an oxygen bar, it depletes after some time, with no oxygen, you slowly take damage, until you die. surfacing refills the whole oxygen bar. I wanted some way of conveying when the player takes damage other than just the health bar. I added this colored vignette effect that fades in/out when the player takes damage, it also turns green for gaining health, and blue for being underwater.

I've realized that the beginning stages of a project are really just building the tools you need to build the game. In this case it's things like the death manager, the spawn system, an audio subsystem (manager, interfaces), the player controller, ladders, an interaction system. These tools are necessary for building the content of the game, but aren't content themselves.

## Environment Interaction

Now that there's a few systems, we need some small things that will populate the maps so that it's a little interesting... Man cannons, well I wanted to add these, but it looks like a lot of work, so they are being tabled for some time. Portals are in the game, well, more teleporters. They'll get you from point A to point B but aren't too fancy. These were baked into ECM2 and aren't the greatest.

![image-right2](/assets/images/castle-wars/update1/teleporters.png){: .align-center}

Ladders, also baked into ECM2, also aren't the greatest. This ladder script was meant for a 3rd person game, so the walk forward control goes up and the walk backward control goes down, even when looking in other directions. Popping on/off ladders is weird. I sort of integrated ladders into the interactable system, but the interact range and the ladder range is different.

## Sounds

Now it is time to add in sound. The game so far is fun to control but has no juice, which is what makes a game feel alive. Sound is the easiest way to make something feel better. I do that with video transitions, too.

Sounds fall into a few categories. There's sounds produced by the character, and sounds produced by the environment. And there are also sound systems that produce or modify existing sounds experienced by the player character.

When it comes to player-produced sounds there are a few issues. Voice acting, and Gender presentation. I don't want the players to be speaking words, so I don't really have to deal with voice actors. When it comes to gender presentation, I want to be as inclusive as I can.

From a Humble Bundle I had purchased I have a unity asset called Human Vocal Sounds. It has many "Male and Female" vocal sounds. I want the player to be able to choose a vocal presentation. This vocal presentation doesn't have to align with appearance. You are able to choose masculine or feminine so far. I want to have a non-binary vocal presentation, but I don't know what a non-binary vocal presentation would sound like. I just don't have a reference point nor a means to create one yet.

The Human Vocal Sounds Pack has no talking, but it has stuff like thinking, breathing, jumping, sighing, and grunting. I am using these as a basis for most of the character produced sounds.

The list of player-produced sounds is as follows:
- Thinking
- Light breathing
- Heavy breathing
- Taking damage
- Grunting
- Sighing (gaining health)
- Bones breaking for fall damage
- Dash
- Jumping
- Double jumping
- Crouching / fabric shuffling

I did not add in any environmentally produced sounds this sprint. This is all in a testing environment. I am making lists of placeholders and "still need" notes for things like sounds, animations, UI, etc.

It was at this time when I realized I was leaning heavily into the perfectionist side of myself. This is still an MVP, or Minimum Viable Product. It must be a good proof of concept for a game, not the final product. There is no way for me record and produce AAA quality sounds in 2-3 days. I just have to make it a good enough experience to play with a few friends. That being said though, I did do some minor editing to sound files in Adobe Audition. Just some EQ work, compression, and volume leveling so that they are easier to control in Unity.

## Audio Systems

The Last thing I did this sprint was audio systems. These can produce or modify the sounds the player experiences. These systems make the world feel much more like a world.

The first system is falling wind noise. If the player is falling, wind noise slowly fades in, which is like if you were falling in real life.

There is a low health system that fades in/out a heartbeat. If health is under 40% of the max, a slow heartbeat is played, under 20% a fast heartbeat is played. This adds tension in the low end, further emphasizing the need for health.

I wanted there to be a health regen tone akin to the Halo 2 regen tone. So, I wrote this procedural audio script which is like a mini synthesizer. It makes a sound of a specific frequency; I control the frequency and the gain from script. There are also settings for low and high cutoffs, noise, and offsets. I really want to do more with this in the future, because it’s like having a synthesizer without having a synthesizer.

All sounds are just a prefab that’s gets deleted when the sound runs out. I wanted to add in a muffling effect for underwater. I added a lowpass filter to the sound object. When the player gets in the water all the sound objects get the lowpass filter set at 1000 Hz and get reset when the player leaves the water. There is also a sound effect for getting into and out of the water. Finally, I have a short ambient loop that plays when the player is underwater that sounds like the water brushing past the player.

I tabled player movement sounds until later, since I want to commit time to a footstep system in sync with the animations, and that change according to the surface the player is on. This system will also include sliding sounds and landing from the air. There are already idle sounds the player makes, but the breathing from walking and heavy breathing from sprinting are not there yet. I also implemented a small dash FOV effect and made an indicator for when the player takes damage, gets health, or is underwater.

What’s next? Combat. I have to make swords and basic abilities, then hook all of that up to the health system.

Best,
Frank
