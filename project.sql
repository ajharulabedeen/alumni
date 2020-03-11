SELECT
    profile_basics.id,
    profile_basics.user_id,
    profile_basics.batch,
    profile_basics.dept,
    profile_basics.first_name
FROM
    `profile_basics`
INNER JOIN `administration_people` ON administration_people.user_id = profile_basics.user_id
WHERE
    administration_people.role_id = '22'
--------------------------------------------------
    public function getAllRegisteredUser(
        string $per_page,
        string $sort_by,
        string $sort_on,
        string $column_name,
        string $key,
        string $event_id)
    {
        // TODO: Implement getAllRegisteredUser() method.
        if ($sort_by == "ASC") {
            $order = "ASC";
        } else {
            $order = "DESC";
        }

SELECT * FROM `profile_basics` INNER JOIN event_registrations on event_registrations.user_id=profile_basics.user_id WHERE profile_basics.dept  LIKE "%E%" GROUP BY  profile_basics.user_id
ORDER BY `profile_basics`.`user_id`  DESC
------------------
SELECT
    profile_basics.user_id,
    profile_basics.batch,
    profile_basics.dept,
    profile_basics.first_name,
    event_registrations.event_id
FROM
    `profile_basics`
INNER JOIN event_registrations ON event_registrations.user_id = profile_basics.user_id
WHERE
    profile_basics.dept LIKE "%EE%"
GROUP BY
    profile_basics.user_id
ORDER BY
    `profile_basics`.`user_id`
DESC
---------------------
SELECT
    profile_basics.user_id,
    profile_basics.batch,
    profile_basics.dept,
    profile_basics.first_name,
    event_registrations.event_id
FROM
    `profile_basics`
INNER JOIN event_registrations ON event_registrations.user_id = profile_basics.user_id
WHERE
    profile_basics.dept LIKE "%%" AND event_registrations.event_id = '110'
GROUP BY
    profile_basics.user_id
ORDER BY
    `profile_basics`.`user_id`
DESC
------------------------
SELECT
    profile_basics.user_id,
    profile_basics.batch,
    profile_basics.dept,
    profile_basics.first_name,
    event_registrations.event_id
FROM
    `profile_basics`
INNER JOIN event_registrations ON event_registrations.user_id = profile_basics.user_id
WHERE
    event_registrations.event_id = '110'
GROUP BY
    profile_basics.user_id
ORDER BY
    `profile_basics`.`user_id`
DESC
++++++++++++++++++++++
SELECT
    profile_basics.user_id,
    profile_basics.batch,
    profile_basics.dept,
    profile_basics.first_name,
    event_registrations.event_id
FROM
    `profile_basics`
INNER JOIN event_registrations ON event_registrations.user_id = profile_basics.user_id
WHERE
    event_registrations.event_id = '110' AND profile_basics.dept LIKE '%%'
GROUP BY
    profile_basics.user_id
ORDER BY
    `profile_basics`.`user_id`
DESC
====================================
SELECT
    profile_basics.user_id,
    profile_basics.batch,
    profile_basics.dept,
    profile_basics.first_name,
    event_registrations.event_id,
    event_payments.payment_type_id,
    payment_mobiles.status,
    payment_mobiles.id,
    COUNT(*)
FROM
    `profile_basics`
INNER JOIN event_registrations ON event_registrations.user_id = profile_basics.user_id
INNER JOIN event_payments ON event_payments.event_id = event_registrations.event_id
INNER JOIN payment_mobiles ON payment_mobiles.type_ID = event_payments.payment_type_id
WHERE
    event_registrations.event_id = '110' AND profile_basics.dept LIKE '%%'
GROUP BY
    profile_basics.user_id
ORDER BY
    `profile_basics`.`user_id`
DESC

        $data = DB::table('profile_basics as b')
            ->join('event_registrations',
                'event_registrations.user_id',
                '=',
                'b.user_id')
            ->select(
                'b.user_id'
                , 'b.first_name'
                , 'b.last_name'
                , 'b.student_id'
                , 'b.dept'
                , 'b.batch')
            ->where('b.' . $column_name, 'LIKE', $key)
//            ->orderBy($sort_on, $order)
            ->groupBy('profile_basics.user_id')
            ->paginate($per_page)
            ->get();


        $data = DB::table('profile_basics')
            ->join('event_registrations',
                'event_registrations.user_id',
                '=',
                'profile_basics.user_id')
            ->select(
                'profile_basics.user_id'
                , 'profile_basics.first_name'
                , 'profile_basics.last_name'
                , 'profile_basics.student_id'
                , 'profile_basics.dept'
                , 'profile_basics.batch')
            ->where('profile_basics.' . $column_name, 'LIKE', $key)
//            ->orderBy($sort_on, $order)
            ->groupBy('profile_basics.user_id')
            ->paginate($per_page)
            ->get();
        return $data;
    }
>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
$data = DB::table('profile_basics as b')
            ->join('event_registrations',
                'event_registrations.user_id',
                '=',
                'b.user_id')
            ->select(
                'b.user_id'
                , 'b.dept'
                , 'b.batch'
                , 'b.dept'
                , 'b.first_name'
                , 'b.last_name'
                , 'b.student_id'
                , 'b.batch')
            ->where('b.' . $column_name, 'LIKE', $key)
            ->where("event_registrations.event_id", "=", $event_id)
            ->orderBy($sort_on, $order)
//            ->groupBy('profile_basics.user_id')
            ->paginate($per_page);


