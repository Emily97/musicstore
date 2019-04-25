function validateCheckBoxes(boxes, min, max){
	var count = 0;

	for(i=0; i < boxes.length; i++){
		if(boxes[i].checked){
			count++;
		}
	}
	return count >= min && count <= max;
}