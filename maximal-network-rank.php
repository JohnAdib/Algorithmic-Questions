<?php
/**
 * This answer is based on the given sample.
 * There is an almost similar question in LeetCode, which you can see through the link below.
 * https://leetcode.com/problems/maximal-network-rank/
 *
 * The difference between the two questions is that in the current question,
 * the cities must be interconnected, while in the LeetCode question,
 * both cities can be selected and the score is important.
 *
 */

function solution($A, $B, $N) {
	// variable to save matrix
	$matrix = [];
	// calc total of roads given as input
	$roads_count = count($A);

	// loop for each road
	for ($i=0; $i < $roads_count; $i++) {

		if(isset($matrix[$A[$i]])) {
		// if matrix exist for A , plus plus it
			$matrix[$A[$i]]++;
		}
		else {
		// else set 1
			$matrix[$A[$i]] = 1;
		}

		if(isset($matrix[$B[$i]])){
		// if matrix exist for B , plus plus it
			$matrix[$B[$i]]++;
		}
		else {
			// else set 1
			$matrix[$B[$i]] = 1;
		}
	}

	// set default rank
	$rank = 0;
	// loop for each roads
	for ($i=0; $i < $roads_count; $i++) {
		// calc total value of rank
		$total = $matrix[$A[$i]] + $matrix[$B[$i]] - 1;
		// set max value into rank
		$rank = max($rank, $total);
	}

	// have a good day
	return $rank;
}



// given examples
var_dump(solution([1,2,3,3], [2,3,1,4], 4)); // 4
var_dump(solution([1,2,4,5], [2,3,5,6], 6)); // 2

// extra examples
var_dump(solution([0,0,1,1], [1,3,2,3], 4)); // 4
var_dump(solution([0,0,1,1,2,2], [1,3,2,3,3,4], 5)); // 5

