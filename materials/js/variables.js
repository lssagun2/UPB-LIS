//declaration of global variables
var sort = "";				//stores how the materials will be sorted
var sort_direction = 1;		//stores the direction of sorting (1 if ASC or -1 if DESC)
var material_count;			//stores the number of materials for the current filters
var page_count;				//stores the number of pages given the number of materials and the maximum number of rows for each page
var circ_type_filter = [], type_filter = [], status_filter = [], location_filter = []; //arrays that store all possible filters per category