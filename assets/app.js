import React, {useEffect, useState} from 'react';
import ReactDOM, {render} from 'react-dom';
class MyComponent extends React.Component {
    state = {
        data: null,
    };

    componentDidMount() {
        fetch('/product')
            .then(response => response.json())
            .then(data => this.setState({ data }));
    }

    render() {
        const { data } = this.state;

        if (!data) {
            return <div>Loading...</div>;
        }

        return (
            <ul>
                {Object.keys(data).forEach(key => (
                    <li key={key}>{`${key}: ${data[key]}`}</li>
                ))}
            </ul>
        );
    }
}

ReactDOM.render(<MyComponent />, document.getElementById('app'));
