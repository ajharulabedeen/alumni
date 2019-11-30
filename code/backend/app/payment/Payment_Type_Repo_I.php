<?php
namespace App\payment;

use App\payment\PaymentType;

interface Payment_Type_Repo_I {
    /**
     *  @return id id of the newly created, payment type.
     */
    public function create(PaymentType $paymentType);

    public function update(PaymentType $paymentTypeUpdate);

    public function findOnePaymentType($id);

    public function getAllPaymentType($per_page, $sort_by, $sort_on);

    public function countAll();

    public function delete($id);
    
    /**
     * @param   id id of the education, not the user id.
     * @return  status  boolean. 1 : success; 0 : fail.
     * @uses    not is use now. cause findOne is security risk. Random id can be send from front end. more rboust method that
     * user_id will be taken from the system : user_id of the current logged user.
     */
}
