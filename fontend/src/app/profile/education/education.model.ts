export class Education {

  private id: string;
  private user_id: string;
  private degree_name: string;
  private institue_name: string;
  private passing_year: string;
  private result: string;

    /**
     * Getter $id
     * @return {string}
     */
	public get $id(): string {
		return this.id;
	}

    /**
     * Getter $user_id
     * @return {string}
     */
	public get $user_id(): string {
		return this.user_id;
	}

    /**
     * Getter $degree_name
     * @return {string}
     */
	public get $degree_name(): string {
		return this.degree_name;
	}

    /**
     * Getter $institue_name
     * @return {string}
     */
	public get $institue_name(): string {
		return this.institue_name;
	}

    /**
     * Getter $passing_year
     * @return {string}
     */
	public get $passing_year(): string {
		return this.passing_year;
	}

    /**
     * Getter $result
     * @return {string}
     */
	public get $result(): string {
		return this.result;
	}

    /**
     * Setter $id
     * @param {string} value
     */
	public set $id(value: string) {
		this.id = value;
	}

    /**
     * Setter $user_id
     * @param {string} value
     */
	public set $user_id(value: string) {
		this.user_id = value;
	}

    /**
     * Setter $degree_name
     * @param {string} value
     */
	public set $degree_name(value: string) {
		this.degree_name = value;
	}

    /**
     * Setter $institue_name
     * @param {string} value
     */
	public set $institue_name(value: string) {
		this.institue_name = value;
	}

    /**
     * Setter $passing_year
     * @param {string} value
     */
	public set $passing_year(value: string) {
		this.passing_year = value;
	}

    /**
     * Setter $result
     * @param {string} value
     */
	public set $result(value: string) {
		this.result = value;
	}


}
