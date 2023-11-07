<!DOCTYPE html>
<html>
	<head>
		<script src="https://cdn.jsdelivr.net/gh/google/code-prettify@master/loader/run_prettify.js"></script>
		<link rel="stylesheet" href="desert.css">

		<title>tristans website</title>
		<link rel="stylesheet" href="style.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>
		<?php include("header.php")?>
		<div class="scrollable">
			<div class="mainspace">
				<a href="https://exercism.org/tracks/haskell/exercises/strain">
					<h1>
						exercism strain
					</h1>
				</a>
				My understanding of this exercise is to create a function that can be
				enacted on a list-like object. Taking an argument of either keep
				or discard, and returning only the even numbers (for keep) or the odd
				(for discard).
				<p>
				The challenge is to write the function in four different ways, but
				right now ive rewritten the same code several times trying to avoid
				unnecessary loops. Call it practice for big-o-notation.
				<h2>
					1main.c
				</h2>
				My first challenge was trying to create an array only containing the
				even numbers, but an array must be initialised with its length before
				knowing the elements it'll contain, meaning two identical loops.
				Feels unnecessary
				<p>
				So I implemented a couple of linked list functions to have a
				dynamically growing array.
				<p>
				Fuck it thats too much, just print out the numbers, who cares.<br>
<div id="hscrollpre">
<pre class="prettyprint">
<code>
#include &ltstdio.h&gt
#include &ltstdlib.h&gt

int main(int argc, char* argv[]) {
        int len=argc-1;
        int inputList[len];
        for (int i=0; i&ltlen; i++) {
              inputList[i] = *argv[i+1] - '0';
        }

        // 0=even, 1=odd
        int keep = 1;
        int currInt;
        for (int i=0; i&ltlen; i++) {
                currInt = inputList[i];
                if (currInt % 2 == keep) {
                        printf("%d ", currInt);
                }
        }
        printf("\n");
        return 0;
}
// i cant use a predefined list size before knowing how many items it will contain,
//   and i cant know how many it will contain without iterating over it fully first
//       so I'd be running the same loop twice, which would be bad. So there must be
//       another way.
// Ill have to make a dynamically growing array, I know a linked list should work
//   fine, I was just hoping there'd be a simpler option.
// I tried to allow keepdiscard() to only take two arguments, the list itself
//   and the even or odd boolean, but you cant pass an array without knowing
//   its size.
//   Yeah, passing an argument changes the type to something like a container,
//     so it doesnt have the same bytesize as the original, even when using a
//     pointer. So length must be specified or determined by loop.
//       Determining by loop is complicated

</code>
</pre>
</div>
				Just slapped in googles prettyprint for this<br>
				I feel like it's an extremely simple solution, so I'm gonna try
				again soon, maybe in another language that has support for the
				functional programming ideals.
				<h2>
					2main.c
				</h2>
				Ok just a quick one this time. Dont overthink it, just parse the input,
				output as per user choice (actually, no)
				<p>
<div id="hscrollpre">
<pre class="prettyprint">
<code>
#include &ltstdio.h&gt

int isEven(int i) {
//      return i % 2; // 1=odd

        // could also do
        while (i &gt 1) {
                i -= 2;
        }
        return i;
}

int main (int argc, char* argv[]) {
        // I could do with learning standards for int** argv instead of int* argv[]

        int element;
        //keep
        for (int i=1; i&ltargc; i++) {
                element = *argv[i] - '0';
                if (isEven(element) == 0) {
                        printf("%d ", element);
                }
        }
        printf("\n");
        //discard
        for (int i=1; i&ltargc; i++) {
                element = *argv[i] - '0';
                if (isEven(element) == 1) {
                        printf("%d ", element);
                }
        }
        printf("\n");
        return 0;
 }
</code>
</pre>
</div>
				<p>
				yeah, look its pretty much the same thing.
			</div>
		</div>
		<div class="footer">
			gruvbox theme coming soon<br>
			0421 670 103, fulford.tristan@gmail.com<br>
			pls dont hack me
		</div>
	</body>
</html>
