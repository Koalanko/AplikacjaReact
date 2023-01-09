import React, {useEffect, useState} from 'react';
import ReactDOM, {render} from 'react-dom';
import {Link} from "react-router-dom";
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
            <div className="stock-container">
                {data.map((data, key) => {
                    return (
                        <div key={key}>
                            {"Imię zwierzaka: "+ data.name +
                                " , Typ zwierzaka: " +
                                data.type }
                        </div>
                    );
                })}
            </div>
        );
    }
}
export function MyButton() {
    return <Link to="/product">Click me</Link>;
}

export default MyComponent;
ReactDOM.render(<MyComponent />, document.getElementById('app'));
ReactDOM.render(<MyButton />, document.getElementById('button'));