export class News {
  private id: string;
  private user_id: string;
  private title: string;
  private description: string;
  private notes: string;
  private post_date: string;
  private images: string;
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
     * Getter $title
     * @return {string}
     */
	public get $title(): string {
		return this.title;
	}

    /**
     * Getter $description
     * @return {string}
     */
	public get $description(): string {
		return this.description;
	}

    /**
     * Getter $notes
     * @return {string}
     */
	public get $notes(): string {
		return this.notes;
	}

    /**
     * Getter $post_date
     * @return {string}
     */
	public get $post_date(): string {
		return this.post_date;
	}

    /**
     * Getter $images
     * @return {string}
     */
	public get $images(): string {
		return this.images;
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
     * Setter $title
     * @param {string} value
     */
	public set $title(value: string) {
		this.title = value;
	}

    /**
     * Setter $description
     * @param {string} value
     */
	public set $description(value: string) {
		this.description = value;
	}

    /**
     * Setter $notes
     * @param {string} value
     */
	public set $notes(value: string) {
		this.notes = value;
	}

    /**
     * Setter $post_date
     * @param {string} value
     */
	public set $post_date(value: string) {
		this.post_date = value;
	}

    /**
     * Setter $images
     * @param {string} value
     */
	public set $images(value: string) {
		this.images = value;
	}


}
