export class JobsSearch {

  private user_id: string;
  private name: string;
  private student_id: string;
  private dept: string;
  private batch: string;
  private organization_name: string;
  private type: string;
  private role: string;
  private current_status: string;


    /**
     * Getter $user_id
     * @return {string}
     */
	public get $user_id(): string {
		return this.user_id;
	}

    /**
     * Getter $name
     * @return {string}
     */
	public get $name(): string {
		return this.name;
	}

    /**
     * Getter $student_id
     * @return {string}
     */
	public get $student_id(): string {
		return this.student_id;
	}

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
     * Getter $organization_name
     * @return {string}
     */
	public get $organization_name(): string {
		return this.organization_name;
	}

    /**
     * Getter $type
     * @return {string}
     */
	public get $type(): string {
		return this.type;
	}

    /**
     * Getter $role
     * @return {string}
     */
	public get $role(): string {
		return this.role;
	}

    /**
     * Getter $current_status
     * @return {string}
     */
	public get $current_status(): string {
		return this.current_status;
	}

    /**
     * Setter $user_id
     * @param {string} value
     */
	public set $user_id(value: string) {
		this.user_id = value;
	}

    /**
     * Setter $name
     * @param {string} value
     */
	public set $name(value: string) {
		this.name = value;
	}

    /**
     * Setter $student_id
     * @param {string} value
     */
	public set $student_id(value: string) {
		this.student_id = value;
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
     * Setter $organization_name
     * @param {string} value
     */
	public set $organization_name(value: string) {
		this.organization_name = value;
	}

    /**
     * Setter $type
     * @param {string} value
     */
	public set $type(value: string) {
		this.type = value;
	}

    /**
     * Setter $role
     * @param {string} value
     */
	public set $role(value: string) {
		this.role = value;
	}

    /**
     * Setter $current_status
     * @param {string} value
     */
	public set $current_status(value: string) {
		this.current_status = value;
	}

}
