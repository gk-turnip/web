<?php $pageTitle = 'Game Servers Architecture' ?>

<?php include "includes/header.php" ?>

<h1>Game Servers Architecture</h1>
<p class="abstract">This document is based on a post by Raven about how our game should be architected from the point of view of the various servers required.  Particularly how it will scale up to a huge game (assuming we ever get there) and how we can build in at least a little redundance.</p>
<h2>advantages of virtual servers:</h2>
<p>Virtual servers off load a huge headache of having your own datacenter.  And in my opinion it will be a shade less expensive than having your own datacenter for the size of game we are building. Virtual servers also have the advantage of being able to get a new one on-line fairly quickly.   For example lets say we have one "pod" that is a stand by pod.  We would have to pay the monthly fee on that.  If one pod goes down, we can switch it to the new pod, we can then get another virtual slice on-line to be the new backup pod, we won't have to pay for the pod that went down next month, so we end up only paying for one extra pod.  In a physical computer setup we would have to have much more equipment, because the time delay to get the next redundant server on-line would be to go out and buy one.</p>

<h2>login server:</h2>
<p>I'm assuming a single server here.  It needs to handle many connections, but not any serious cpu requirements, except perhaps the password hash.  For security reasons the hash algorithm should be intentionally made to take about between 1.0ms and 0.1ms (hash of a hash in a loop for example). The load is hopefully within one servers capabilities. It was not my intent to architect it as distributed across multiple servers.</p>

<h2>web server:</h2>
<p>It should be a single server, but it should be easy to distribute this to multiple servers if required.</p>

<h2>game server:</h2>
<p>This will be architected to be multiple servers, each running a large multi-threaded program. The basic game design is shaping up to be "pods", each pod should be able to run on its own server, with its own database, postgresql. There will be an api connection to a master database on the master database server. All context within the pod are within this database. When a user enters a pod, their entire user context moves to that pod's database, and gets removed from the previous pod. The master database only needs to know what pod they are in. The pod servers must be able to run without the master database server.  If the master database server goes down from a system problem or software upgrade, the pods need to be able to keep running.  once the master database is back on-line it will have to query all the pods to get any context it is missing.</p>

<h2>chat server:</h2>
<p>Each pod handles its own chat. We will then need a master chat server, but the load will be trivial.  If two players wish to chat and are in different pods, the two pods need to send the traffic between them.</p>

<h2>master database server:</h2>
<p>It will be a postgresql database holding user accounts and some basic user context. Most of the user context will be in the "pod" where the user resides. It was not my intent to architect this as distributed servers, but because the "pods" handle most of the load, it should not be necessary.</p>

<h2>backup servers:</h2>
<p>Each pod is going to need to continuously stream out any context changes to a backup server. In the event of a total pod failure, a new virtual slice will need to be brought on-line and the most recent context will need to be sent from the backup server.  This can easily be as many as required.</p>

<h2>monitoring servers:</h2>
<p>Each pod is going to need a monitor, each pod cannot monitor itself, but the pods can monitor each other. The load is not heavy, so we would not need separate servers for the monitors.
there would need to be monitors on all the other servers as well as the pods.<p>

<h2>firewall/security:</h2>
<p>We are going to rely heavily on iptables (a Linux software firewall), since each server is going to be directly connected to the internet. Iptables will keep the databases within each pod outside the reach of the Internet.  All api ports on all servers will be locked down (via iptables) to the list of servers handling the entire game.  Since the programs will be open, this will hopefully keep out any "exploits" of our apis.</p>

<h2>program updates:</h2>
<p>All inner program api's need to be architected to be backwards compatible.  By that I mean that one "pod" on version 1.3 of the system must be able to communicate with the master database server at version 1.2 and another pod at version 1.1.  Obviously, once all servers are up to a certain version, we can eliminate any extra api code to handle the previous versions.</p>
<p>We would also need to be able to have a "test pod", that is hooked into the production system but will only be visible to some test users.  We test out a new pod version before we start dropping them into live production.</p>
<p>We need to have some game event like "meteor alert", where everyone has to get out of a pod. We then take down the pod, kick anybody off who is still on, update the pod's software, bring the pod back on-line, at which point the "meteor alert" has passed.</p>

<p class="contributors">Turnip, Raven</p>
<p class="updated">Last updated 8:00am Dec 16, 2012 EDT</p>

<?php include "includes/footer.php" ?>
