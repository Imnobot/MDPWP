<?php

// --- HELPER FUNCTION to get table names ---
function mvp_get_stat_table_names() {
    global $wpdb;
    return [
        'stats'        => $wpdb->prefix . "mvp_statistics",
        'playlists'    => $wpdb->prefix . "mvp_playlists",
        'country'      => $wpdb->prefix . "mvp_statistics_country",
        'country_play' => $wpdb->prefix . "mvp_statistics_country_play",
        'user'         => $wpdb->prefix . "mvp_statistics_user",
        'user_play'    => $wpdb->prefix . "mvp_statistics_user_play",
    ];
}


/**
 * Get Top Plays Today
 * Added Playlist Title
 */
function mvp_getTopPlayToday($playlist_id, $limit = null, $dir = null){
    global $wpdb;
    $tables = mvp_get_stat_table_names();

    $results = [];
    $limit = absint($limit ?? 10);
    $dir = (strtoupper($dir ?? 'DESC') === 'ASC') ? 'ASC' : 'DESC'; // Sanitize direction

    $select_clause = "SELECT stats.media_id, stats.title AS media_title, pl.title AS playlist_title, SUM(stats.c_play) AS total_count"; // Added playlist_title
    $from_clause = "FROM {$tables['stats']} AS stats LEFT JOIN {$tables['playlists']} AS pl ON stats.playlist_id = pl.id";
    $where_clause = "WHERE stats.c_date = CURDATE()";
    $group_by_clause = "GROUP BY stats.media_id, stats.title, pl.title"; // Added pl.title
    $having_clause = "HAVING SUM(stats.c_play) > 0";
    $order_by_clause = "ORDER BY total_count $dir";
    $limit_clause = $wpdb->prepare("LIMIT 0, %d", $limit);

    if($playlist_id != '-1'){
        $playlist_id_int = absint($playlist_id); // Sanitize ID
        // Ensure where_clause ends correctly before appending AND
        if (!empty($where_clause)) $where_clause .= " AND"; else $where_clause = "WHERE";
        $where_clause .= $wpdb->prepare(" stats.playlist_id = %d", $playlist_id_int);

        $query = "$select_clause $from_clause $where_clause $group_by_clause $having_clause $order_by_clause $limit_clause";
        $results = $wpdb->get_results($query, ARRAY_A);
    } else { // All playlists
        $query = "$select_clause $from_clause $where_clause $group_by_clause $having_clause $order_by_clause $limit_clause";
        $results = $wpdb->get_results($query, ARRAY_A);
    }

    return $results;
}


// Note: mvp_getTopPlayLastXDaysTotal seems complex and might not directly display media/playlist titles in its output format (sums per day).
// We'll skip modifying it unless specifically needed later, as it calculates grand totals per day.
function mvp_getTopPlayLastXDaysTotal($player_id = null, $playlist_id = null, $x = null, $limit = null, $dir = null){
    global $wpdb;
    $tables = mvp_get_stat_table_names();

    $results = [];
    $x = absint($x ?? 30); // Default to 30 days if not set

    // This function calculates *total plays per day* across potentially multiple media/playlists.
    // It doesn't seem designed to return individual media/playlist titles in its final output.
    // The original logic is kept for now. If the goal changes, this needs re-evaluation.

    // Original complex logic:
    $subquery_select = "SELECT date(c_date) AS stat_day, media_id, title, SUM(c_play) AS total_count";
    $subquery_from = "FROM {$tables['stats']}";
    $subquery_where = $wpdb->prepare("WHERE c_date > DATE_SUB(CURDATE(), INTERVAL %d DAY)", $x); // Use DATE_SUB for clarity if needed
    $subquery_group_by = "GROUP BY date(c_date), media_id, title";
    $subquery_having = "HAVING SUM(c_play) > 0";
    $subquery_order_by = "ORDER BY SUM(c_play) DESC"; // Inner order for potential row_number() logic

    if($player_id != null){
         // This seems incorrect based on table schema, 'player_id' is not in mvp_statistics
         // Keeping original logic, but it might not work as intended.
         // $subquery_where .= $wpdb->prepare(" AND player_id = %d", absint($player_id)); // Commenting out potentially erroneous line
         error_log("MVP Warning: Filtering mvp_getTopPlayLastXDaysTotal by player_id is not supported by the current schema.");
    }
    else if($playlist_id == '-1'){
         // No additional WHERE needed for all playlists
    }
    else if ($playlist_id !== null && $playlist_id !== '-2') { // Ensure not the special case '-2'
         $playlist_id_int = absint($playlist_id);
         $subquery_where .= $wpdb->prepare(" AND playlist_id = %d", $playlist_id_int);
    }
     // Handle special case '-2' if necessary based on its meaning, currently does nothing extra

    $outer_query = "SELECT stat_day, SUM(total_count) as total_count
                    FROM ( $subquery_select $subquery_from $subquery_where $subquery_group_by $subquery_having $subquery_order_by ) t
                    GROUP BY stat_day
                    ORDER BY stat_day";

    $results = $wpdb->get_results($outer_query, ARRAY_A);

    return $results;
}


/**
 * Get Top Plays in Last X Days
 * Added Playlist Title
 */
function mvp_getTopPlayLastXDays($playlist_id, $x, $limit = null, $dir = null){
    global $wpdb;
    $tables = mvp_get_stat_table_names();

    $results = [];
    $x = absint($x ?? 7); // Default 7 days
    $limit = absint($limit ?? 10);
    $dir = (strtoupper($dir ?? 'DESC') === 'ASC') ? 'ASC' : 'DESC';

    $select_clause = "SELECT stats.media_id, stats.title AS media_title, pl.title AS playlist_title, SUM(stats.c_play) AS total_count";
    $from_clause = "FROM {$tables['stats']} AS stats LEFT JOIN {$tables['playlists']} AS pl ON stats.playlist_id = pl.id";
    $where_clause = $wpdb->prepare("WHERE stats.c_date > DATE_SUB(CURDATE(), INTERVAL %d DAY)", $x); // Use DATE_SUB
    $group_by_clause = "GROUP BY stats.media_id, stats.title, pl.title";
    $having_clause = "HAVING SUM(stats.c_play) > 0";
    $order_by_clause = "ORDER BY total_count $dir";
    $limit_clause = $wpdb->prepare("LIMIT 0, %d", $limit);

    if($playlist_id != '-1'){
        $playlist_id_int = absint($playlist_id);
        // Ensure where_clause ends correctly before appending AND
        if (!empty($where_clause)) $where_clause .= " AND"; else $where_clause = "WHERE";
        $where_clause .= $wpdb->prepare(" stats.playlist_id = %d", $playlist_id_int);

        $query = "$select_clause $from_clause $where_clause $group_by_clause $having_clause $order_by_clause $limit_clause";
        $results = $wpdb->get_results($query, ARRAY_A);
    } else {
        $query = "$select_clause $from_clause $where_clause $group_by_clause $having_clause $order_by_clause $limit_clause";
        $results = $wpdb->get_results($query, ARRAY_A);
    }

    return $results;
}

/**
 * Get Top Plays This Week
 * Added Playlist Title
 */
function mvp_getTopPlayThisWeek($playlist_id, $limit = null, $dir = null){
    global $wpdb;
    $tables = mvp_get_stat_table_names();

    $results = [];
    $limit = absint($limit ?? 10);
    $dir = (strtoupper($dir ?? 'DESC') === 'ASC') ? 'ASC' : 'DESC';

    $select_clause = "SELECT stats.media_id, stats.title AS media_title, pl.title AS playlist_title, SUM(stats.c_play) AS total_count";
    $from_clause = "FROM {$tables['stats']} AS stats LEFT JOIN {$tables['playlists']} AS pl ON stats.playlist_id = pl.id";
    $where_clause = "WHERE YEARWEEK(stats.c_date, 1) = YEARWEEK(CURDATE(), 1)"; // Mode 1: Week starts Monday, range 01-53
    $group_by_clause = "GROUP BY stats.media_id, stats.title, pl.title";
    $having_clause = "HAVING SUM(stats.c_play) > 0";
    $order_by_clause = "ORDER BY total_count $dir";
    $limit_clause = $wpdb->prepare("LIMIT 0, %d", $limit);

    if($playlist_id != '-1'){
        $playlist_id_int = absint($playlist_id);
        // Ensure where_clause ends correctly before appending AND
        if (!empty($where_clause)) $where_clause .= " AND"; else $where_clause = "WHERE";
        $where_clause .= $wpdb->prepare(" stats.playlist_id = %d", $playlist_id_int);

        $query = "$select_clause $from_clause $where_clause $group_by_clause $having_clause $order_by_clause $limit_clause";
        $results = $wpdb->get_results($query, ARRAY_A);
    } else {
        $query = "$select_clause $from_clause $where_clause $group_by_clause $having_clause $order_by_clause $limit_clause";
        $results = $wpdb->get_results($query, ARRAY_A);
    }

    return $results;
}

/**
 * Get Top Plays This Month
 * Added Playlist Title
 */
function mvp_getTopPlayThisMonth($playlist_id, $limit = null, $dir = null){
    global $wpdb;
    $tables = mvp_get_stat_table_names();

    $results = [];
    $limit = absint($limit ?? 10);
    $dir = (strtoupper($dir ?? 'DESC') === 'ASC') ? 'ASC' : 'DESC';

    $select_clause = "SELECT stats.media_id, stats.title AS media_title, pl.title AS playlist_title, SUM(stats.c_play) AS total_count";
    $from_clause = "FROM {$tables['stats']} AS stats LEFT JOIN {$tables['playlists']} AS pl ON stats.playlist_id = pl.id";
    $where_clause = "WHERE stats.c_date >= DATE_FORMAT(CURDATE(),'%Y-%m-01')"; // Use CURDATE() for safety
    $group_by_clause = "GROUP BY stats.media_id, stats.title, pl.title";
    $having_clause = "HAVING SUM(stats.c_play) > 0";
    $order_by_clause = "ORDER BY total_count $dir";
    $limit_clause = $wpdb->prepare("LIMIT 0, %d", $limit);

    if($playlist_id != '-1'){
        $playlist_id_int = absint($playlist_id);
        // Ensure where_clause ends correctly before appending AND
        if (!empty($where_clause)) $where_clause .= " AND"; else $where_clause = "WHERE";
        $where_clause .= $wpdb->prepare(" stats.playlist_id = %d", $playlist_id_int);

        $query = "$select_clause $from_clause $where_clause $group_by_clause $having_clause $order_by_clause $limit_clause";
        $results = $wpdb->get_results($query, ARRAY_A);
    } else {
        $query = "$select_clause $from_clause $where_clause $group_by_clause $having_clause $order_by_clause $limit_clause";
        $results = $wpdb->get_results($query, ARRAY_A);
    }

    return $results;
}

/**
 * Get Top Plays All Time
 * Added Playlist Title
 */
function mvp_getTopPlayAllTime($playlist_id, $limit = null, $dir = null){
    global $wpdb;
    $tables = mvp_get_stat_table_names();

    $results = [];
    $limit = absint($limit ?? 10);
    $dir = (strtoupper($dir ?? 'DESC') === 'ASC') ? 'ASC' : 'DESC';

    $select_clause = "SELECT stats.media_id, stats.title AS media_title, pl.title AS playlist_title, SUM(stats.c_play) AS total_count";
    $from_clause = "FROM {$tables['stats']} AS stats LEFT JOIN {$tables['playlists']} AS pl ON stats.playlist_id = pl.id";
    $where_clause = ""; // Start with empty WHERE
    $group_by_clause = "GROUP BY stats.media_id, stats.title, pl.title";
    $having_clause = "HAVING SUM(stats.c_play) > 0";
    $order_by_clause = "ORDER BY total_count $dir";
    $limit_clause = $wpdb->prepare("LIMIT 0, %d", $limit);

    if($playlist_id != '-1'){
        $playlist_id_int = absint($playlist_id);
        $where_clause = $wpdb->prepare("WHERE stats.playlist_id = %d", $playlist_id_int);

        $query = "$select_clause $from_clause $where_clause $group_by_clause $having_clause $order_by_clause $limit_clause";
        $results = $wpdb->get_results($query, ARRAY_A);
    } else {
        $query = "$select_clause $from_clause $where_clause $group_by_clause $having_clause $order_by_clause $limit_clause";
        $results = $wpdb->get_results($query, ARRAY_A);
    }

    return $results;
}

/**
 * Get Top Downloads All Time
 * Added Playlist Title
 */
function mvp_getTopDownloadAllTime($playlist_id, $limit = null, $dir = null){
    global $wpdb;
    $tables = mvp_get_stat_table_names();

    $results = [];
    $limit = absint($limit ?? 10);
    $dir = (strtoupper($dir ?? 'DESC') === 'ASC') ? 'ASC' : 'DESC';

    $select_clause = "SELECT stats.media_id, stats.title AS media_title, pl.title AS playlist_title, SUM(stats.c_download) AS total_count";
    $from_clause = "FROM {$tables['stats']} AS stats LEFT JOIN {$tables['playlists']} AS pl ON stats.playlist_id = pl.id";
    $where_clause = "";
    $group_by_clause = "GROUP BY stats.media_id, stats.title, pl.title";
    $having_clause = "HAVING SUM(stats.c_download) > 0";
    $order_by_clause = "ORDER BY total_count $dir";
    $limit_clause = $wpdb->prepare("LIMIT 0, %d", $limit);

    if($playlist_id != '-1'){
        $playlist_id_int = absint($playlist_id);
        $where_clause = $wpdb->prepare("WHERE stats.playlist_id = %d", $playlist_id_int);

        $query = "$select_clause $from_clause $where_clause $group_by_clause $having_clause $order_by_clause $limit_clause";
        $results = $wpdb->get_results($query, ARRAY_A);
    } else {
        $query = "$select_clause $from_clause $where_clause $group_by_clause $having_clause $order_by_clause $limit_clause";
        $results = $wpdb->get_results($query, ARRAY_A);
    }

    return $results;
}


/**
 * Get Total Plays/Time/Downloads/Finishes for specific media/title in last X days
 * This function is used for the graph and doesn't need playlist title (it's for one media item)
 */
function mvp_getTotalLastXDays($media_id, $title, $x, $data_display){
    global $wpdb;
    $tables = mvp_get_stat_table_names();

    // Validate $data_display to prevent SQL injection
    $allowed_columns = ['c_play', 'c_time', 'c_download', 'c_finish'];
    $safe_data_display = [];
    if (is_array($data_display)) {
         $safe_data_display = array_intersect($data_display, $allowed_columns);
    }
    if (empty($safe_data_display)) {
        $safe_data_display = ['c_play']; // Default to c_play if nothing valid
    }
    $select_str = implode(", ", $safe_data_display);

    $x = absint($x);
    $media_id = absint($media_id);
    // Title is assumed to be sanitized before being passed to this function (e.g., in mvp_stat_create_graph)

    $results = $wpdb->get_results($wpdb->prepare(
        "SELECT {$select_str}, c_date FROM {$tables['stats']} WHERE media_id = %d AND title = %s AND c_date > DATE_SUB(CURDATE(), INTERVAL %d DAY) ORDER BY c_date ASC", // Use ASC for chronological order
        $media_id, $title, $x
    ), ARRAY_A);

    return $results ?? []; // Return empty array if query fails or yields no results
}

/**
 * Get Top Finishes All Time
 * Added Playlist Title
 */
function mvp_getTopFinishAllTime($playlist_id, $limit = null, $dir = null){
    global $wpdb;
    $tables = mvp_get_stat_table_names();

    $results = [];
    $limit = absint($limit ?? 10);
    $dir = (strtoupper($dir ?? 'DESC') === 'ASC') ? 'ASC' : 'DESC';

    $select_clause = "SELECT stats.media_id, stats.title AS media_title, pl.title AS playlist_title, SUM(stats.c_finish) AS total_count";
    $from_clause = "FROM {$tables['stats']} AS stats LEFT JOIN {$tables['playlists']} AS pl ON stats.playlist_id = pl.id";
    $where_clause = "";
    $group_by_clause = "GROUP BY stats.media_id, stats.title, pl.title";
    $having_clause = "HAVING SUM(stats.c_finish) > 0";
    $order_by_clause = "ORDER BY total_count $dir";
    $limit_clause = $wpdb->prepare("LIMIT 0, %d", $limit);

    if($playlist_id != '-1'){
        $playlist_id_int = absint($playlist_id);
        $where_clause = $wpdb->prepare("WHERE stats.playlist_id = %d", $playlist_id_int);

        $query = "$select_clause $from_clause $where_clause $group_by_clause $having_clause $order_by_clause $limit_clause";
        $results = $wpdb->get_results($query, ARRAY_A);
    } else {
        $query = "$select_clause $from_clause $where_clause $group_by_clause $having_clause $order_by_clause $limit_clause";
        $results = $wpdb->get_results($query, ARRAY_A);
    }

    return $results;
}

/**
 * Get Top Plays Per Country All Time
 * This function aggregates by country. Including playlist title isn't meaningful here.
 * Keeping original logic.
 */
function mvp_getTopPlaysPerCountryAllTime($playlist_id = null, $player_id = null, $limit = null, $dir = null){
    global $wpdb;
    $tables = mvp_get_stat_table_names();

    $results = [];
    $limit = absint($limit ?? 10);
    $dir = (strtoupper($dir ?? 'DESC') === 'ASC') ? 'ASC' : 'DESC';

    $select_clause = "SELECT SUM(scpt.c_play) AS total_count, SUM(scpt.c_time) AS c_time, sct.country, sct.country_code, sct.continent";
    $from_clause = "FROM {$tables['country_play']} as scpt LEFT JOIN {$tables['country']} sct on scpt.country_id = sct.id";
    $where_clause = "WHERE sct.country_code IS NOT NULL"; // Ensure we only count valid countries
    $group_by_clause = "GROUP BY sct.id, sct.country, sct.country_code, sct.continent"; // Group by country details including ID
    $having_clause = "HAVING SUM(scpt.c_play) > 0";
    $order_by_clause = "ORDER BY total_count $dir";
    $limit_clause = $wpdb->prepare("LIMIT 0, %d", $limit);


    if($playlist_id == '-1'){ // All Playlists
        // No additional WHERE needed
    } else if($playlist_id == '-2'){ // Special case? Original returned empty array.
         return []; // Keep original behavior
    } else if($playlist_id !== null){ // Specific Playlist
        $playlist_id_int = absint($playlist_id);
        if (!empty($where_clause)) $where_clause .= " AND"; else $where_clause = "WHERE";
        $where_clause .= $wpdb->prepare(" scpt.playlist_id = %d", $playlist_id_int);
    } else if($player_id != null){ // Specific Player - Not supported by schema
         error_log("MVP Warning: Filtering mvp_getTopPlaysPerCountryAllTime by player_id is not supported.");
         // Optionally add WHERE 1=0 to return nothing, or just let it run without player filter.
         // Keeping it without player filter for now.
    }

    $query = "$select_clause $from_clause $where_clause $group_by_clause $having_clause $order_by_clause $limit_clause";
    $results = $wpdb->get_results($query, ARRAY_A);

    return $results;
}


/**
 * Get Top Plays Per User All Time
 * This function aggregates by user. Including playlist title isn't meaningful here.
 * Keeping original logic.
 */
function mvp_getTopPlaysPerUserAllTime($playlist_id = null, $player_id = null, $limit = null, $dir = null){
    global $wpdb;
    $tables = mvp_get_stat_table_names();

    $results = [];
    $limit = absint($limit ?? 10);
    $dir = (strtoupper($dir ?? 'DESC') === 'ASC') ? 'ASC' : 'DESC';

    $select_clause = "SELECT SUM(supt.c_play) AS total_count, SUM(supt.c_time) AS c_time, sut.id AS user_stat_id, sut.user_id, sut.user_display_name, sut.user_role"; // Selected sut.id as user_stat_id
    $from_clause = "FROM {$tables['user_play']} as supt LEFT JOIN {$tables['user']} sut on supt.user_id = sut.id";
    $where_clause = "WHERE sut.id IS NOT NULL"; // Ensure join worked
    $group_by_clause = "GROUP BY sut.id, sut.user_id, sut.user_display_name, sut.user_role"; // Group by user details including the stats table ID
    $having_clause = "HAVING SUM(supt.c_play) > 0";
    $order_by_clause = "ORDER BY total_count $dir";
    $limit_clause = $wpdb->prepare("LIMIT 0, %d", $limit);

    if($playlist_id == '-1'){ // All playlists
         // No additional WHERE needed
    } else if($playlist_id == '-2'){ // Special case?
         return [];
    } else if($playlist_id !== null){ // Specific playlist
        $playlist_id_int = absint($playlist_id);
        if (!empty($where_clause)) $where_clause .= " AND"; else $where_clause = "WHERE";
        $where_clause .= $wpdb->prepare(" supt.playlist_id = %d", $playlist_id_int);
    } else if($player_id != null){ // Specific player - player_id not in user_play table
        error_log("MVP Warning: Filtering mvp_getTopPlaysPerUserAllTime by player_id is not supported.");
        // Keeping it without player filter.
    }

    $query = "$select_clause $from_clause $where_clause $group_by_clause $having_clause $order_by_clause $limit_clause";
    $results = $wpdb->get_results($query, ARRAY_A);

    return $results;
}

/**
 * Get Top Plays Per User For a Specific Video All Time
 * Added Playlist Title
 */
function mvp_getTopPlaysPerUserForVideoAllTime($playlist_id, $media_id, $limit = null){
    global $wpdb;
    $tables = mvp_get_stat_table_names();

    $results = [];
    $limit = absint($limit ?? 10);
    $playlist_id_int = absint($playlist_id);
    $media_id_int = absint($media_id);

    $select_clause = "SELECT supt.media_id, supt.title AS media_title, pl.title AS playlist_title, supt.thumb, SUM(supt.c_play) AS total_count, SUM(supt.c_time) AS c_time, sut.id AS user_stat_id, sut.user_id, sut.user_display_name, sut.user_role";
    $from_clause = "FROM {$tables['user_play']} as supt
                    LEFT JOIN {$tables['user']} sut on supt.user_id = sut.id
                    LEFT JOIN {$tables['playlists']} AS pl ON supt.playlist_id = pl.id"; // Join playlists
    $where_clause = $wpdb->prepare("WHERE supt.playlist_id = %d AND supt.media_id = %d AND sut.id IS NOT NULL", $playlist_id_int, $media_id_int); // Added user table join check
    $group_by_clause = "GROUP BY sut.id, sut.user_id, sut.user_display_name, sut.user_role, pl.title"; // Group by user and playlist title
    $having_clause = "HAVING SUM(supt.c_play) > 0";
    $order_by_clause = "ORDER BY total_count DESC";
    $limit_clause = $wpdb->prepare("LIMIT 0, %d", $limit);

    $query = "$select_clause $from_clause $where_clause $group_by_clause $having_clause $order_by_clause $limit_clause";
    $results = $wpdb->get_results($query, ARRAY_A);

    return $results;
}

/**
 * Get Top Videos Played By a Specific User All Time
 * Added Playlist Title
 */
function mvp_getTopPlaysPerUserVideosAllTime($user_id, $limit = null){
    global $wpdb;
    $tables = mvp_get_stat_table_names();

    $results = [];
    $limit = absint($limit ?? 10);
    $user_id_int = absint($user_id); // This is the ID from the mvp_statistics_user table

    $select_clause = "SELECT supt.media_id, supt.title AS media_title, pl.title AS playlist_title, supt.thumb, SUM(supt.c_play) AS total_count, SUM(supt.c_time) AS c_time, sut.id AS user_stat_id, sut.user_id AS wp_user_id, sut.user_display_name, sut.user_role"; // Use wp_user_id alias if needed
    $from_clause = "FROM {$tables['user_play']} as supt
                    LEFT JOIN {$tables['user']} sut on supt.user_id = sut.id
                    LEFT JOIN {$tables['playlists']} AS pl ON supt.playlist_id = pl.id"; // Join playlists
    $where_clause = $wpdb->prepare("WHERE supt.user_id = %d AND sut.id IS NOT NULL", $user_id_int); // Filter by the ID from stats_user table & ensure join
    $group_by_clause = "GROUP BY supt.media_id, supt.title, pl.title, sut.id, sut.user_id, sut.user_display_name, sut.user_role"; // Group by media, playlist, and user details
    $having_clause = "HAVING SUM(supt.c_play) > 0";
    $order_by_clause = "ORDER BY total_count DESC";
    $limit_clause = $wpdb->prepare("LIMIT 0, %d", $limit);

    $query = "$select_clause $from_clause $where_clause $group_by_clause $having_clause $order_by_clause $limit_clause";
    $results = $wpdb->get_results($query, ARRAY_A);

    return $results;
}

/**
 * Get Total Counts (Plays, Time, Download, Finish) for a Playlist or All
 * Does not need playlist title as it returns single row summary.
 */
function mvp_getTotal($playlist_id){
    global $wpdb;
    $tables = mvp_get_stat_table_names();
    $results = null;

    if($playlist_id != '-1'){
        $playlist_id_int = absint($playlist_id);
        $query = $wpdb->prepare(
            "SELECT SUM(c_play) AS c_play, SUM(c_time) AS c_time, SUM(c_download) AS c_download, SUM(c_finish) AS c_finish FROM {$tables['stats']} WHERE playlist_id = %d",
             $playlist_id_int
         );
        $results = $wpdb->get_row($query, ARRAY_A);
    } else {
        $results = $wpdb->get_row("SELECT SUM(c_play) AS c_play, SUM(c_time) AS c_time, SUM(c_download) AS c_download, SUM(c_finish) AS c_finish FROM {$tables['stats']}", ARRAY_A);
    }

    // Ensure default values if no stats found
    if (!$results) {
        $results = ['c_play' => 0, 'c_time' => 0, 'c_download' => 0, 'c_finish' => 0];
    } else {
         // Cast results to int/float as needed, as SUM might return strings or null
         $results['c_play'] = (int)($results['c_play'] ?? 0);
         $results['c_time'] = (int)($results['c_time'] ?? 0);
         $results['c_download'] = (int)($results['c_download'] ?? 0);
         $results['c_finish'] = (int)($results['c_finish'] ?? 0);
    }

    return $results;
}

/**
 * Get All Media Stats (Aggregated)
 * Added Playlist Title
 */
function mvp_getAll($playlist_id = null, $player_id = null, $order = null, $dir = null){
    global $wpdb;
    $tables = mvp_get_stat_table_names();

    $results = [];
    $dir = (strtoupper($dir ?? 'DESC') === 'ASC') ? 'ASC' : 'DESC';

    // Sanitize Order By column - map input $order to actual DB column names/aliases
    $valid_order_columns = [
        'media_title' => 'media_title',
        'playlist_title' => 'playlist_title',
        'total_play' => 'total_play',
        'total_time' => 'total_time',
        'total_download' => 'total_download',
        'total_finish' => 'total_finish',
        // Add mappings for legacy sort keys from JS if needed
        'title' => 'media_title',
        'duration' => 'total_time', // Assuming duration means total time played
        'play' => 'total_play',
        'download' => 'total_download',
        'finish' => 'total_finish'
    ];
    $order_by_col = 'total_play'; // Default sort column alias
    if (!empty($order) && isset($valid_order_columns[$order])) {
        $order_by_col = $valid_order_columns[$order];
    }

    $select_clause = "SELECT stats.media_id, stats.title AS media_title, pl.title AS playlist_title, SUM(stats.c_play) AS total_play, SUM(stats.c_time) AS total_time, SUM(stats.c_download) AS total_download, SUM(stats.c_finish) AS total_finish";
    $from_clause = "FROM {$tables['stats']} AS stats LEFT JOIN {$tables['playlists']} AS pl ON stats.playlist_id = pl.id";
    $where_clause = ""; // Base WHERE
    $group_by_clause = "GROUP BY stats.media_id, stats.title, pl.title";
    $order_by_clause = "ORDER BY $order_by_col $dir, media_title ASC"; // Added secondary sort


    if($playlist_id === null && $player_id === null) { // Default case if both null, treat as "All"
        $playlist_id = '-1';
    }

    if($playlist_id == '-1'){ // All Playlists
        // No specific WHERE needed for playlist_id
    } else if($playlist_id == '-2'){ // Special case: Media ID is null?
         // This case groups only by stats.title where media_id IS NULL.
         // Playlist join is not applicable here. Keeping original intent.
         // Note: Using $order_by_col (which might be playlist_title) here will likely cause an SQL error.
         // Defaulting sort order for this specific case.
         $safe_order_by_col_case2 = ($order_by_col === 'playlist_title') ? 'media_title' : $order_by_col;
         $query = "SELECT title AS media_title, SUM(c_play) AS total_play, SUM(c_time) AS total_time, SUM(c_download) AS total_download, SUM(c_finish) AS total_finish FROM {$tables['stats']} WHERE media_id IS NULL GROUP BY title ORDER BY $safe_order_by_col_case2 $dir";
         $results = $wpdb->get_results($query, ARRAY_A);
         return $results; // Return early for this special case
    } else if($playlist_id != null){ // Specific Playlist
        $playlist_id_int = absint($playlist_id);
        $where_clause = $wpdb->prepare("WHERE stats.playlist_id = %d", $playlist_id_int);
    } else if ($player_id != null) { // Player ID - Not supported by schema
         error_log("MVP Warning: Filtering mvp_getAll by player_id is not supported.");
         // Proceed as if it was "All Playlists"
    }

    // Construct and execute the query for standard cases
    $query = "$select_clause $from_clause $where_clause $group_by_clause $order_by_clause";
    $results = $wpdb->get_results($query, ARRAY_A);

    return $results;
}


// Original helper function - looks fine.
function mvp_getIdsForPlaylistCreation($results){
    $ids = []; // Initialize as empty array
    if (is_array($results)) {
        foreach($results as $key){
            // Check if media_id exists and is not null before adding
            if (isset($key['media_id']) && $key['media_id'] !== null && !in_array($key['media_id'], $ids)) {
                 $ids[] = $key['media_id'];
             }
        }
    }
    $ids_string = implode("_", $ids);
    return $ids_string;
}

?>