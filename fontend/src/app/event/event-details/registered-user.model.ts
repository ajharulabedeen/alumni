export class RegisteredUser {
  private dept : string;
  private batch : string;
  private student_id : string;
  private first_name : string;
  private last_name : string;
  private gender : string;
  private email : string;
  private phone : string;

    /**
     * Getter $dept
     * @return {string}
     */
	public get $dept(): string {
		return this.dept;
	}

    /**
     * Getter $batch
     * @return {string}
     */
	public get $batch(): string {
		return this.batch;
	}

    /**
     * Getter $student_id
     * @return {string}
     */
	public get $student_id(): string {
		return this.student_id;
	}

    /**
     * Getter $first_name
     * @return {string}
     */
	public get $first_name(): string {
		return this.first_name;
	}

    /**
     * Getter $last_name
     * @return {string}
     */
	public get $last_name(): string {
		return this.last_name;
	}

    /**
     * Getter $gender
     * @return {string}
     */
	public get $gender(): string {
		return this.gender;
	}

    /**
     * Getter $email
     * @return {string}
     */
	public get $email(): string {
		return this.email;
	}

    /**
     * Getter $phone
     * @return {string}
     */
	public get $phone(): string {
		return this.phone;
	}

    /**
     * Getter $user_id
     * @return {string}
     */
	public get $user_id(): string {
		return this.user_id;
	}

    /**
     * Setter $dept
     * @param {string} value
     */
	public set $dept(value: string) {
		this.dept = value;
	}

    /**
     * Setter $batch
     * @param {string} value
     */
	public set $batch(value: string) {
		this.batch = value;
	}

    /**
     * Setter $student_id
     * @param {string} value
     */
	public set $student_id(value: string) {
		this.student_id = value;
	}

    /**
     * Setter $first_name
     * @param {string} value
     */
	public set $first_name(value: string) {
		this.first_name = value;
	}

    /**
     * Setter $last_name
     * @param {string} value
     */
	public set $last_name(value: string) {
		this.last_name = value;
	}

    /**
     * Setter $gender
     * @param {string} value
     */
	public set $gender(value: string) {
		this.gender = value;
	}

    /**
     * Setter $email
     * @param {string} value
     */
	public set $email(value: string) {
		this.email = value;
	}

    /**
     * Setter $phone
     * @param {string} value
     */
	public set $phone(value: string) {
		this.phone = value;
	}

    /**
     * Setter $user_id
     * @param {string} value
     */
	public set $user_id(value: string) {
		this.user_id = value;
	}
  private user_id : string;

}
