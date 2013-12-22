p4.wingsthings.biz
==================

CSCI E-15 Dynamic Web Applications - Harvard Extension School
By: Derek Thurston

A Little Bird Told Me….

1. The user snaps a photo of someone doing something naughty or nice.
2. The user creates an account or logs in
3. The user uploads the photo
4. The user creates or edits the photo into a post card from a little birdie who was watching
5. The user adds a note to tell whoever was naughty or nice what they did!
6. The user can send as an email or postcard

Usage of javascript:

I'm using javascript to flip the card on v_postcard_index.php.  The function flipCard() is called and it passes the id
of the card to the jquery expression, which manipulates the div holding the front and the back of the card.

As well, I was trying to get printThis() integrated in to print the front and back of the post card.  I'm running
into issues with the image which starts out with div style="display: none;" showing up when you click on the print
option at the bottom of the post card.  I could have gone the easy route and made the front and back of the postcard
display all at once, but I wanted the card to flip over.

