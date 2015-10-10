		
		// .small-box arrange
		function arrangeNotes() {
			
			//settings
			var gridDistance = 93; // spacing between notes, in pixels
			var maxOffset = 14; // maximum random offset from given position, in pixels
			
			// selectors
			var theArea = $('.small-box-holder');
			var smallNote = $('.small-box-holder .small-box');
			

			// initial values
			var positionX = 0 - gridDistance;
			var positionY = 0;
			var rowCount = 0;
			
			var maxX = theArea.width() - 60;
			var maxY = theArea.height() - 61;
			
			// loops through and positions each small note; also adds bg
			for(var i = 0; i < smallNote.length; i++) {
				
				var thisNote = smallNote.eq(i);
				
				// set initial position according to gridDistance
				positionX = positionX + gridDistance;
				
				if (positionX > maxX) { 
					if (rowCount%2 == 0) { positionX = gridDistance / 2 } 
					else { positionX = 0 - gridDistance };
					positionY = positionY + (gridDistance / 2);
					rowCount++;
				};
				
				// z-index & new position
				var posOrNegOffset = 1;
				var randomZindex = Math.floor(Math.random()*(100)) + 5;
				var newX = positionX + (Math.floor(Math.random()*maxOffset) * posOrNegOffset);
				var newY = positionY + (Math.floor(Math.random()*maxOffset) * posOrNegOffset);
				
				// randomly place note if it falls out-of-bounds
				if (newX > maxX || newX < 0) { newX = Math.floor(Math.random()*(maxX + 1)); }
				if (newY > maxY || newY < 0) { newY = Math.floor(Math.random()*(maxY + 1)); }
				
				// background image
				var bgImgClass;
				var bgImgColor = Math.floor(Math.random()*5);
				var bgImgCounter = i%3 + 1;
				
				if (bgImgCounter == 1 && i%2 == 0) { bgImgCounter++ }; // makes style 1 of the small notes less common
				
				
				if      (bgImgColor == 0) { bgImgClass = "a" + bgImgCounter; thisNote.addClass('color1') }
				else if (bgImgColor == 1) { bgImgClass = "b" + bgImgCounter; thisNote.addClass('color2') }
				else if (bgImgColor == 2) { bgImgClass = "c" + bgImgCounter; thisNote.addClass('color3') }
				else if (bgImgColor == 3) { bgImgClass = "d" + bgImgCounter; thisNote.addClass('color4') }
				else					  { bgImgClass = "e" + bgImgCounter; thisNote.addClass('color5') };


				// set style
				thisNote.addClass(bgImgClass).css({'display' : 'block', 'top' : newY, 'left' : newX, 'zIndex' : randomZindex});
				

			};
		};
		
		/*	THIS IS NOW IN BASE.HTML	
		var isMsie8orBelow = false;
		if( ua && ua.msie && ua.version < 9 ) {
			isMsie8orBelow = true;
		};
		*/
		
		// .small-box hover and click	
		function smallNoteEvents() {
			var hoverZindexCounter = 106;
						
			var hoveredNoteTop;
			

			
			$(".small-box").hover(
				function () {
					var thisNote = $(this);
					
					
					$(this).css({'zIndex' : hoverZindexCounter});
					
					
					
						hoveredNoteTop = $(this).position().top;
						$(this).animate({ 
							top: "-=3px"
							}, { "duration": 400, "easing": "swing" });
					
				},
				function () {
					
						$(this).stop(true, true).animate({ 
							top: hoveredNoteTop+"px"
						}, { "duration": 50, "easing": "swing" });
					
					hoverZindexCounter++;
				}
			);
			

			
		};
		
		
			
		//test();
		//arrangeNotes();
		//smallNoteEvents();
		
		

	
