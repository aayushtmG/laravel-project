    <form action={{route('language.switch')}} method="GET">
        @csrf
        <select name="language" id="language" onchange="this.form.submit()">
            <option value="en" {{app()->getLocale() == "en" ? 'selected': ''}} >English</option>
            <option value="ne" {{app()->getLocale() == "ne" ? 'selected': ''}}>Nepali</option>
        </select>
    </form>